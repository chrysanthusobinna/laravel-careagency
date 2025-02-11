<?php

namespace App\Http\Controllers\MainSite;
use App\Http\Controllers\Controller;
use App\Traits\MainsiteViewSharedDataTrait;

class HomeController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    public function index()
    {        
        return view('mainsite.pages.home');
    }
}
