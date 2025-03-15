<?php

namespace App\Http\Controllers\CareGivers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class CareGiverDashboardController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    } 
    
    public function index()
    {
        return view('caregiver.pages.dashboard');
    }
}
