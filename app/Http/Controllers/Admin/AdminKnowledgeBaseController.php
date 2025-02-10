<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKnowledgeBaseController extends Controller
{
    /**
     * Show the Knowledge Base page.
     */
    public function index()
    {
        return view('admin.pages.knowledge-base');
    }
}
