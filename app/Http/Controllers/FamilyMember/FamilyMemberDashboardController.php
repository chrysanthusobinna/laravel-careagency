<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class FamilyMemberDashboardController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        $this->shareViewData();  // Call the method from the trait
    }
    
    public function index()
    {
        return view('familymember.pages.dashboard');
    }
}
