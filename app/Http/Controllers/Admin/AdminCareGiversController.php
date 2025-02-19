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

class AdminCareGiversController extends Controller
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
        $careGiversData = $this->getUsersByRole('care_giver');

        $careGivers = $careGiversData['users'];
        $activeCount = $careGiversData['active_count'];

        return view('admin.pages.list-caregivers', compact('careGivers', 'activeCount'));
    }

    public function show(Request $request, $id)
    {
        // Validate user ID to ensure it's a valid care giver
        $validator = Validator::make(
            ['id' => $id], // Data being validated
            [
                'id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->where('role', 'care_giver');
                    }),
                ],
            ],
            [
                'id.exists' => 'The selected user is either invalid or not a care giver.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.caregivers.index')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or not a care giver.');
        }
    
        // Fetch the user if validation passes
        $user = User::findOrFail($id);
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
