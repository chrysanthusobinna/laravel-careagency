<?php

namespace App\Http\Controllers\ServiceUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceUserDashboardController extends Controller
{
    public function index()
    {
        return view('serviceusers.pages.dashboard');
    }
}
