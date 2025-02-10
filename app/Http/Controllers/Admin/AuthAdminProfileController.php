<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\UserViewTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthAdminProfileController extends Controller
{
    use UserViewTrait;

    /**
     * Show the profile of the authenticated admin user.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $userId = Auth::id();  
        $user = $this->getUserById($userId);  

        return view('admin.pages.auth-admin-profile', compact('user'));
    }
}
