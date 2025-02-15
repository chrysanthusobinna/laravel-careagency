<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserViewTrait;
use App\Traits\UserCreateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminUsersController extends Controller
{
    use UserCreateTrait;
    use UserListTrait;
    use UserViewTrait;
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    // Display a listing of admin users (Admin Level 1).
    public function index()
    {
        $adminUsersData = $this->getUsersByRole('admin_level_1');

        $adminUsers = $adminUsersData['users'];
        $activeCount = $adminUsersData['active_count'];

        return view('admin.pages.list-adminusers', compact('adminUsers', 'activeCount'));
    }

 
    // Show a specific admin user.
    public function show($id)
    {
        $user = $this->getUserById($id);
        return view('admin.pages.view-adminuser', compact('user'));
    }

 
    // Show the form for creating a new admin user.
    public function create()
    {
        return view('admin.pages.create-adminuser');
    }


    // Store a newly created admin user.

    public function store(RegisterUserRequest $request)
    {
        $role = 'admin_level_1';
        $password_change_required = 1;

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role, $password_change_required);

        return redirect()->route('adminusers.index')->with('success', 'Admin user added successfully!');
    }
}
