<?php

namespace App\Http\Controllers\CareBeneficiary;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class CareBeneficiaryDashboardController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    } 
    
    public function index()
    {
        return view('carebeneficiary.pages.dashboard');
    }
}
