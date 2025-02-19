<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserCreateTrait;
use Illuminate\Validation\Rule;
use App\Models\EligibilityRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterUserRequest;
use App\Traits\AuthUserViewSharedDataTrait;
 
class AdminServiceUsersController extends Controller
{
    use UserCreateTrait;
    use UserListTrait;
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

        $totalCount = $serviceUsersData['total_count'];
        $activeCount = $serviceUsersData['active_count'];
        $eligibleCount = EligibilityRequest::where('status', 'eligible')->count();

        return view('admin.pages.list-serviceusers', compact('serviceUsers','totalCount', 'activeCount', 'eligibleCount'));
    }
    
    public function show(Request $request, $id)
    {
        // Validate user ID to ensure it's a valid service user
        $validator = Validator::make(
            ['id' => $id], // Data being validated
            [
                'id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->where('role', 'service_user');
                    }),
                ],
            ],
            [
                'id.exists' => 'The selected user is either invalid or not a service user.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.service-users.index')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or not a service user.');
        }
    
        // Fetch the user if validation passes
        $user = User::findOrFail($id);
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
