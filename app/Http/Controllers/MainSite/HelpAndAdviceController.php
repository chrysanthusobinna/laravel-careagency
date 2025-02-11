<?php

namespace App\Http\Controllers\MainSite;

use Illuminate\Http\Request;
use App\Traits\CompanyContactTrait;
use App\Http\Controllers\Controller;
use App\Traits\MainsiteViewSharedDataTrait;

class HelpAndAdviceController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    
    public function index()
    {
        
        return view('mainsite.pages.helpandadvice');
    }
}
