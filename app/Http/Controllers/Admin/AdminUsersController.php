<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserCreateTrait;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterUserRequest;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminUsersController extends Controller
{
    use UserCreateTrait;
    use UserListTrait;
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
    public function show(Request $request, $id)
    {
        $validator = Validator::make(
            ['id' => $id], // Data being validated
            [
                'id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->whereIn('role', ['admin_level_1', 'admin_level_2']);
                    }),
                ],
            ],
            [
                'id.exists' => 'The selected user is either invalid or does not have admin privileges.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.admin.users.index')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or does not have admin privileges.');
        }
    
        // Fetch the user if validation passes
        $user = User::findOrFail($id);
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

        return redirect()->route('admin.users.index')->with('success', 'Admin user added successfully!');
    }
}
