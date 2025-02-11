<?php

namespace App\Http\Controllers\ServiceUsers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class ServiceUserKnowledgeBaseController extends Controller
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
        return view('serviceusers.pages.knowledge-base');
    }
}
