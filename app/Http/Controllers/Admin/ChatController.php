<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Show the chat page.
     */
    public function index()
    {
        return view('admin.pages.chat');
    }
}
