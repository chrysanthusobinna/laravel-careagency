<?php

namespace App\Http\Controllers\MainSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpAndAdviceController extends Controller
{
    public function index()
    {
        return view('mainsite.pages.helpandadvice');
    }
}
