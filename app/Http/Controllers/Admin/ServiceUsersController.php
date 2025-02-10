<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\GetUsersTrait;
use App\Http\Controllers\Controller;
use App\Traits\HandlesUserRetrieval;
use App\Traits\HandlesUserRegistration;
use App\Http\Requests\RegisterUserRequest;

class ServiceUsersController extends Controller
{
    use HandlesUserRegistration;
    use GetUsersTrait;
    use HandlesUserRetrieval;

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
        return view('admin.pages.view-user', compact('user'));
    }

    public function create()
    {
        return view('admin.pages.create-serviceusers');
    }

    public function store(RegisterUserRequest $request)
    {

        $role = 'service_user'; 

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role);

        return redirect()->route('admin.service-users.index')->with('success', 'Service user added successfully! Service users can check their email to verify their account.');

    }

    
}
