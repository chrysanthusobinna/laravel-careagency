<?php

namespace App\Http\Controllers\CareBeneficiary;

use Illuminate\Http\Request;
use App\Models\KnowledgeBasePost;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class CareBeneficiaryKnowledgeBaseController extends Controller
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
        $posts = KnowledgeBasePost::where('category', 'care_beneficiary')->orderBy('created_at', 'desc')->get();
        return view('carebeneficiary.pages.knowledgebase-list', compact('posts'));
    }
    

    // View a specific post
    public function show($id)
    {
        $post = KnowledgeBasePost::where('category', 'care_beneficiary')->findOrFail($id);
        return view('carebeneficiary.pages.knowledgebase-show', compact('post'));
    }
    
}
