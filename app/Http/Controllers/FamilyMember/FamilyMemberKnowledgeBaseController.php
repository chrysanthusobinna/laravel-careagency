<?php

namespace App\Http\Controllers\FamilyMember;

use Illuminate\Http\Request;
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

    // Show the Knowledge Base page.

    public function index()
    {
        return view('familymember.pages.knowledge-base');
    }
}
