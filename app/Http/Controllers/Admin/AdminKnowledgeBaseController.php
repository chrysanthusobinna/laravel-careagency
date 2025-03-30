<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\KnowledgeBasePost;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminKnowledgeBaseController extends Controller
{

    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        $this->shareViewData();
    }
    // SHOW ALL KNOWLEDGE BASE POSTS
    public function index()
    {
        $posts = KnowledgeBasePost::orderBy('created_at', 'desc')->get();
        return view('admin.pages.knowledgebase-list', compact('posts'));
    }

    // CREATE A NEW POST
    public function create()
    {
        return view('admin.pages.knowledgebase-create');
    }

    // Store a newly created post
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:admin,care_giver,care_beneficiary,family_member',
            'media_attachment' => 'nullable|file|mimes:png,jpeg,jpg,mp4|max:10240', // Allow only specific file types (max size: 10MB)
            'is_published' => 'required|boolean',
        ]);
    
        // Get the data from the request
        $data = $request->only(['title', 'content', 'category', 'media_attachment', 'media_file_type']);
    
        // Add the author_user_id from the authenticated user
        $data['author_user_id'] = auth()->id();
    
        if ($request->hasFile('media_attachment')) {
            $file = $request->file('media_attachment');
            $extension = $file->getClientOriginalExtension();
        
            // Generate a random name for the file with timestamp
            $fileName = uniqid(time() . '_') . '.' . $extension;
        
            // Set the storage path based on file type
            if (in_array($extension, ['png', 'jpeg', 'jpg'])) {
                $path = storage_path('app/public/blog-images/' . $fileName);
                $data['media_file_type'] = 'image';
            } elseif ($extension == 'mp4') {
                $path = storage_path('app/public/blog-videos/' . $fileName);
                $data['media_file_type'] = 'video';
            }
        
            // Move the file
            $file->move(dirname($path), basename($path));
        
            // Store the file path in the 'media_attachment' field
            $data['media_attachment'] = basename($path);
            
        }
        
    
        // Handle the publish status and set the published_at field if necessary
        $data['is_published'] = $request->input('is_published');
        if ($data['is_published'] == 1) {
            $data['published_at'] = now();  // Set the current time for the published_at field
        }
    
        // Create the new KnowledgeBasePost record
        KnowledgeBasePost::create($data);
    
        // Redirect with success message
        return redirect()->route('admin.knowledgebase.index')->with('success', 'Post created successfully');
    }
    
    

    // Show the form to edit an existing post
    public function edit($id)
    {
        $post = KnowledgeBasePost::findOrFail($id);
        return view('admin.pages.knowledgebase-edit', compact('post'));
    }

    // Update an existing post
    public function update(Request $request, $id)
    {
        $post = KnowledgeBasePost::findOrFail($id);
    
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:admin,care_giver,care_beneficiary,family_member',
            'media_attachment' => 'nullable|file',
            'is_published' => 'required|boolean',
        ]);
    
        // Get the data from the request
        $data = $request->only(['title', 'content', 'category', 'is_published']);
    
        // If there's a file uploaded, handle it
        if ($request->hasFile('media_attachment')) {
            $file = $request->file('media_attachment');
            $extension = $file->getClientOriginalExtension();
    
            // Generate a random file name with timestamp
            $fileName = uniqid(time() . '_') . '.' . $extension;
    
            // Determine the storage path based on file extension
            if (in_array($extension, ['png', 'jpeg', 'jpg'])) {
                $path = storage_path('app/public/blog-images/' . $fileName);
                $data['media_file_type'] = 'image';
            } elseif ($extension == 'mp4') {
                $path = storage_path('app/public/blog-videos/' . $fileName);
                $data['media_file_type'] = 'video';
            }
    
            // Move the uploaded file to the correct storage path
            $file->move(dirname($path), basename($path));
    
            // Store the file path in the 'media_attachment' field
            $data['media_attachment'] = basename($path);
        }
    
        // Handle the publish status and set the published_at field if necessary
        $data['is_published'] = $request->input('is_published');
        if ($data['is_published'] == 1) {
            $data['published_at'] = now();  // Set the current timestamp for the published_at field
        }
    
        // Update the KnowledgeBasePost record
        $post->update($data);
    
        // Redirect with success message
        return redirect()->route('admin.knowledgebase.show', $id)->with('success', 'Post updated successfully');
    }
    
    

    // Delete an existing post
    public function destroy($id)
    {
        $post = KnowledgeBasePost::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.knowledgebase.index')->with('success', 'Post deleted successfully');
    }

    // View a specific post
    public function show($id)
    {
        $post = KnowledgeBasePost::findOrFail($id);
        return view('admin.pages.knowledgebase-show', compact('post'));
    }

    public function deleteAttachment($id)
    {
        $post = KnowledgeBasePost::findOrFail($id);
    
        // Unlink the file inside the try-catch block
        try {
            $filePath = storage_path('app/public/' . $post->media_attachment);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        } catch (\Exception $e) {
            // Log the error and continue without redirecting with an error
            \Log::error("Error unlinking file for post ID {$id}: " . $e->getMessage());
        }
    
        // Update the post to nullify the media_attachment and media_file_type
        $post->update([
            'media_attachment' => null,
            'media_file_type' => null,
        ]);
    
        return redirect()->route('admin.knowledgebase.show', $id)->with('success', 'Attachment deleted successfully');
    }
    
    
}
