<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserViewTrait;
use App\Traits\UserCreateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminServiceUsersController extends Controller
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

    public function index()
    {
        $serviceUsersData = $this->getUsersByRole('service_user');
        
        $serviceUsers = $serviceUsersData['users'];
        $activeCount = $serviceUsersData['active_count'];
        
        return view('admin.pages.list-serviceusers', compact('serviceUsers', 'activeCount'));
    }
    
    public function show($id)
    {
        $user = $this->getUserById($id);
        return view('admin.pages.view-serviceuser', compact('user'));
    }

    public function create()
    {
        return view('admin.pages.create-serviceusers');
    }

    public function store(RegisterUserRequest $request)
    {

        $role = 'service_user'; 
        $password_change_required = 1;

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role, $password_change_required);

        return redirect()->route('admin.service-users.index')->with('success', 'Service user added successfully! Service users can check their email to verify their account.');

    }

    
}
