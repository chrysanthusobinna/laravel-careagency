<?php

namespace App\Http\Controllers\CareGivers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareGiverDashboardController extends Controller
{
    public function index()
    {
        return view('caregivers.pages.dashboard');
    }
}
