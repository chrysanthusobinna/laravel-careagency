<?php

namespace App\Http\Controllers\ServiceUsers;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class ServiceUserDashboardController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    } 
    
    public function index()
    {
        return view('serviceusers.pages.dashboard');
    }
}
