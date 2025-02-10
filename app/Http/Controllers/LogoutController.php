<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('mainsite.login')->with('success', 'You have been logged out successfully.');
    }
}
