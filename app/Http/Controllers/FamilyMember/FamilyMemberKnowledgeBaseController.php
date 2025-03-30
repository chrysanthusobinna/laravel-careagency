<?php

namespace App\Http\Controllers\FamilyMember;

use Illuminate\Http\Request;
use App\Models\KnowledgeBasePost;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class FamilyMemberKnowledgeBaseController extends Controller
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
        $posts = KnowledgeBasePost::where('category', 'family_member')->orderBy('created_at', 'desc')->get();
        return view('familymember.pages.knowledgebase-list', compact('posts'));
    }
    

    // View a specific post
    public function show($id)
    {
        $post = KnowledgeBasePost::where('category', 'family_member')->findOrFail($id);
        return view('familymember.pages.knowledgebase-show', compact('post'));
    }
}
