<?php

namespace App\Http\Controllers\MainSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FindCarerController extends Controller
{
    public function index()
    {
        return view('mainsite.pages.findcarer');
    }
}
