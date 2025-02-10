<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminDashboardController extends Controller
{

    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    // Show the admin dashboard.
    public function index()
    {
        return view('admin.pages.dashboard');
    }
}
