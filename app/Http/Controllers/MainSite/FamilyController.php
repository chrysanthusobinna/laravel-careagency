<?php

namespace App\Http\Controllers\MainSite;

use App\Traits\CompanyContactTrait;
use App\Http\Controllers\Controller;
use App\Traits\MainsiteViewSharedDataTrait;

class FamilyController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
    
    public function index()
    {
        return view('mainsite.pages.family');
    }
}
