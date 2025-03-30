<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\ChatParticipant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminChatController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    // CHAT LIST
    public function index()
    {
        $chats = Chat::whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->with('chatParticipants')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('admin.pages.chat-index', compact('chats'));
    }

    // SHOW CHAT
    public function show($chatId)
    {
        $chat = Chat::with(['messages.sender', 'users'])->findOrFail($chatId);

        if (!$chat->users->contains(Auth::id())) {
            return redirect()->route('admin.chat.index')->with('error', 'You are not part of this chat.');
        }

        // Find the participant record for the authenticated user in the chat
        $chatParticipant = ChatParticipant::where('chat_id', $chatId)
            ->where('user_id', Auth::id())
            ->first();

        if ($chatParticipant) {
            // Update the unseen_messages field to 0 (indicating that they have seen the messages)
            $chatParticipant->unseen_messages = 0;
            $chatParticipant->save();
        }

        return view('admin.pages.chat-show', compact('chat'));
    }

    // CREATE CHAT
    public function CreateChat()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.pages.chat-create', compact('users'));
    }

    // STORE CHAT
    public function storeChat(Request $request)
    {
        $request->validate([
            'selected_user_ids' => 'required',
            'selected_user_ids.*' => 'exists:users,id',
            'title' => 'required_if:selected_user_ids.*,min:2'
        ]);

        // Decode the selected user IDs (from JSON to array)
        $userIds = json_decode($request->selected_user_ids);

        if (empty($userIds)) {
            return back()->withErrors(['selected_user_ids' => 'At least one user must be selected.']);
        }

        $userIds[] = Auth::id();

        // If only one user is selected (one-on-one chat)
        if (count($userIds) == 2) {
            $existingChat = Chat::whereHas('users', function ($query) use ($userIds) {
                $query->whereIn('user_id', $userIds);
            }, '=', count($userIds)) // Ensure the chat has exactly these participants
                ->whereDoesntHave('users', function ($query) use ($userIds) {
                    $query->whereNotIn('user_id', $userIds);
                })->first();

            if ($existingChat) {
                return redirect()->route('admin.chat.show', $existingChat->id)->with('success', 'Existing chat found.');
            }
        }

        if (count($userIds) > 2 && !$request->has('title')) {
            return back()->withErrors(['title' => 'Please provide a title for the chat.']);
        }

        $chat = Chat::create([
            'title' => $request->title,
        ]);

        foreach ($userIds as $userId) {
            ChatParticipant::create([
                'chat_id' => $chat->id,
                'user_id' => $userId,
            ]);
        }

        return redirect()->route('admin.chat.show', $chat->id)->with('success', 'Chat created successfully.');
    }

    // EDIT CHAT
    public function edit($chatId)
    {
        $users = User::where('id', '!=', Auth::id())->get();

        $chat = Chat::with(['users'])->findOrFail($chatId);

        $chatUsers = $chat->users->filter(function ($user) {
            return $user->id !== Auth::id();
        })->values();

        return view('admin.pages.chat-edit', compact('chat', 'users', 'chatUsers'));
    }

    // UPDATE CHAT
    public function update(Request $request, $chatId)
    {
        $chat = Chat::findOrFail($chatId);

        $request->validate([
            'selected_user_ids' => 'required',
            'selected_user_ids.*' => 'exists:users,id',
            'title' => 'required_if:selected_user_ids.*,min:2'
        ]);

        $userIds = json_decode($request->selected_user_ids);

        if (empty($userIds)) {
            return back()->withErrors(['selected_user_ids' => 'At least one user must be selected.']);
        }

        if (count($userIds) > 1 && !$request->has('title')) {
            return back()->withErrors(['title' => 'Please provide a title for the chat.']);
        }

        $userIds[] = Auth::id();

        if ($request->filled('title')) {
            $chat->update(['title' => $request->title]);
        } else {
            $chat->update(['title' => null]);
        }

        // Sync the chat participants (add or remove based on selected IDs)
        $chat->users()->sync($userIds);

        return redirect()->route('admin.chat.show', $chat->id)->with('success', 'Chat updated successfully.');
    }

    public function deleteChat($chatId)
    {
        $chat = Chat::find($chatId);

        if (!$chat) {
            return redirect()->route('admin.chat.index')->with('error', 'Chat not found.');
        }

        ChatParticipant::where('chat_id', $chatId)->delete();

        $chat->delete();

        return redirect()->route('admin.chat.index')->with('success', 'Chat deleted successfully.');
    }

    // SEND CHAT MESSAGE USING PUSHER
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'chat_id' => 'required|integer',
        ]);

        $message = new Message();
        $message->chat_id = $request->chat_id;
        $message->sender_id = Auth::id();
        $message->message = $request->message;

        try {
            $message->save();

            // Update Chat 'updated_at' column  
            $chat = Chat::findOrFail($request->chat_id);
            $chat->touch();

            // Find all chat participants excluding the authenticated user and add 1 to the current value of unseen_messages
            $chatParticipants = ChatParticipant::where('chat_id', $chat->id)
                ->where('user_id', '!=', Auth::id())
                ->get();

            // Loop through each participant and increment the unseen_messages field
            foreach ($chatParticipants as $chatParticipant) {
                $chatParticipant->unseen_messages += 1;
                $chatParticipant->save();
            }

            // Set up the Pusher instance 
            $options = [
                'cluster' => env('PUSHER_APP_CLUSTER', 'eu'),
                'useTLS' => true
            ];

            $pusher = new \Pusher\Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );

            $sender = Auth::user();

            // Prepare the data to be sent with the event
            $data = [
                'message' => $message->message,
                'sender_id' => $message->sender_id,
                'created_at' => $message->created_at->format('h:i A d M, Y'),
                'updated_at' => $message->updated_at->format('h:i A d M, Y'),
                'sender' => [
                    'first_name' => $sender->first_name,
                    'last_name' => $sender->last_name,
                ]
            ];

            // Trigger the event via Pusher (broadcasting the whole message object)
            $pusher->trigger('chat.' . $request->chat_id, 'message.sent', $data);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send message.',
            ], 500);
        }

        // Return a JSON response for AJAX
        return response()->json([
            'status' => 'Message Sent!',
            'message' => $message,
        ]);
    }

    public function sendAttachment(Request $request)
    {
        // Validate the request (ensure the file is an image)
        $request->validate([
            'attachment' => 'required|file|mimes:jpeg,jpg,png|max:10240', // Max size 10MB
            'chat_id' => 'required|integer',
        ]);

        try {
            // Store the attachment file
            $attachmentPath = $request->file('attachment')->store('chat-attachments', 'public'); // Store in chat-attachments directory

            // Create a new message
            $message = new Message();
            $message->chat_id = $request->chat_id;
            $message->sender_id = Auth::id();
            $message->message = null;
            $message->attachment = $attachmentPath;
            $message->save();

            // Update Chat 'updated_at' column  
            $chat = Chat::findOrFail($request->chat_id);
            $chat->touch();

            // Find all chat participants excluding the authenticated user and add 1 to the current value of unseen_messages
            $chatParticipants = ChatParticipant::where('chat_id', $chat->id)
                ->where('user_id', '!=', Auth::id())
                ->get();

            // Loop through each participant and increment the unseen_messages field
            foreach ($chatParticipants as $chatParticipant) {
                $chatParticipant->unseen_messages += 1;
                $chatParticipant->save();
            }

            // Set up Pusher for broadcasting the message
            $options = [
                'cluster' => env('PUSHER_APP_CLUSTER', 'eu'),
                'useTLS' => true
            ];

            $pusher = new \Pusher\Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );

            $sender = Auth::user();

            // Prepare data to be broadcasted
            $data = [
                'attachment' => $attachmentPath,
                'sender_id' => $message->sender_id,
                'created_at' => $message->created_at->format('h:i A d M, Y'),
                'updated_at' => $message->updated_at->format('h:i A d M, Y'),
                'sender' => [
                    'first_name' => $sender->first_name,
                    'last_name' => $sender->last_name,
                ]
            ];

            // Broadcast the attachment sent event using Pusher
            $pusher->trigger('chat.' . $request->chat_id, 'attachment.sent', $data);

            // Return a JSON response after the file is sent
            return response()->json([
                'status' => 'attachment sent!',
                'attachment' => $attachmentPath,
            ]);
        } catch (\Exception $e) {
            // Log the error and return failure response
            \Log::error('Error sending attachment: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send attachment.',
            ], 500);
        }
    }

    public function updateUnseenMessages($chatId, Request $request)
    {
        // Find the participant record for the authenticated user in the chat
        $chatParticipant = ChatParticipant::where('chat_id', $chatId)
            ->where('user_id', Auth::id())
            ->first();

        if ($chatParticipant) {
            $chatParticipant->unseen_messages = 0;
            $chatParticipant->save();

            return response()->json(['status' => 'Unseen messages updated to 0 successfully']);
        }

        return response()->json(['status' => 'Chat participant not found'], 404);
    }

}
