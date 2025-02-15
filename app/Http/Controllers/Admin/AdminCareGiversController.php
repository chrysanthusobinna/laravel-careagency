<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserViewTrait;
use App\Traits\UserCreateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminCareGiversController extends Controller
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
        $careGiversData = $this->getUsersByRole('care_giver');

        $careGivers = $careGiversData['users'];
        $activeCount = $careGiversData['active_count'];

        return view('admin.pages.list-caregivers', compact('careGivers', 'activeCount'));
    }

    public function show($id)
    {
        $user = $this->getUserById($id);
        return view('admin.pages.view-caregiver', compact('user'));
    }

    public function create()
    {
        return view('admin.pages.create-caregiver');
    }

    public function store(RegisterUserRequest $request) 
    {
        $role = 'care_giver';
        $password_change_required = 1;
    
        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role, $password_change_required);
    
        return redirect()->route('admin.caregivers.index')->with('success', 'Caregiver added successfully! They can check their email to verify their account.');
    }
    
}
