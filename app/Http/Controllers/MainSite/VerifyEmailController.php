<?php

namespace App\Http\Controllers\MainSite;
use App\Http\Controllers\Controller;
use App\Traits\MainsiteViewSharedDataTrait;

class VerifyEmailController extends Controller
{
    use MainsiteViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    public function showVerifyEmailForm()
    {
        return view('mainsite.pages.verify-email');
    }
}
