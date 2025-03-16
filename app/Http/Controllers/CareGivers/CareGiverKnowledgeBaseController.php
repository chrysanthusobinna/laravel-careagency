<?php

namespace App\Http\Controllers\CareGivers;

use Illuminate\Http\Request;
use App\Models\KnowledgeBasePost;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class CareGiverKnowledgeBaseController extends Controller
{
    
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    // SHOW ALL KNOWLEDGE BASE POSTS
    public function index()
    {
        $posts = KnowledgeBasePost::where('category', 'care_giver')->orderBy('created_at', 'desc')->get();
        return view('caregiver.pages.knowledgebase-list', compact('posts'));
    }
    

    // View a specific post
    public function show($id)
    {
        $post = KnowledgeBasePost::where('category', 'care_giver')->findOrFail($id);
        return view('caregiver.pages.knowledgebase-show', compact('post'));
    }
    
}
