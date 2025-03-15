<?php

namespace App\Http\Controllers\CareGivers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\ChatParticipant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthUserViewSharedDataTrait;

class CareGiverChatController extends Controller
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
        ->with('users')
        ->orderBy('updated_at', 'desc')
        ->get();
    
        return view('caregiver.pages.chat-index', compact('chats'));
    }
    

    // SHOW CHAT
    public function show($chatId)
    {
        $chat = Chat::with(['messages.sender', 'users'])->findOrFail($chatId);

        if (!$chat->users->contains(Auth::id())) {
            return redirect()->route('caregiver.chat.index')->with('error', 'You are not part of this chat.');
        }

        return view('caregiver.pages.chat-show', compact('chat'));
    }

    // CREATE CHAT
    public function CreateChat()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('caregiver.pages.chat-create', compact('users'));
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
                return redirect()->route('caregiver.chat.show', $existingChat->id)->with('success', 'Existing chat found.');
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
    
        return redirect()->route('caregiver.chat.show', $chat->id)->with('success', 'Chat created successfully.');
    }
    
    

    // EDIT CHAT
    public function edit($chatId) 
    {
        $users = User::where('id', '!=', Auth::id())->get();

        $chat = Chat::with(['users'])->findOrFail($chatId);

        $chatUsers = $chat->users->filter(function($user) {
            return $user->id !== Auth::id();
        })->values(); 


        return view('caregiver.pages.chat-edit', compact('chat', 'users', 'chatUsers'));
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
    
        return redirect()->route('caregiver.chat.show', $chat->id)->with('success', 'Chat updated successfully.');
    }
    


    public function deleteChat($chatId)
    {
        $chat = Chat::find($chatId);
    
        if (!$chat) {
            return redirect()->route('caregiver.chat.index')->with('error', 'Chat not found.');
        }
    
        ChatParticipant::where('chat_id', $chatId)->delete(); 
    
        $chat->delete();
    
        return redirect()->route('caregiver.chat.index')->with('success', 'Chat deleted successfully.');
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

            // Set up the Pusher instance 
            $options = [
                'cluster' => env('PUSHER_APP_CLUSTER', 'eu'),  // Default to 'eu' if not set in .env
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
 
}
