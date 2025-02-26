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
        // Get all care beneficiary and family members
        $serviceUsers = User::whereIn('role', ['care_beneficiary', 'family_member'])->get();
    
        // Count total care beneficiaries and family members
        $totalCount = $serviceUsers->count();
    
        // Count only active users
        $activeCount = $serviceUsers->where('status', 1)->count();
    
        // Count care beneficiaries eligible  
        $eligibleCount = EligibilityRequest::where('status', 'eligible')->count();
    
        return view('admin.pages.list-serviceusers', compact('serviceUsers', 'totalCount', 'activeCount', 'eligibleCount'));
    }
    
    public function show(Request $request, $id)
    {
        // Validate user ID to ensure it's a valid Care Beneficiary or family member
        $validator = Validator::make(
            ['id' => $id], 
            [
                'id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->whereIn('role', ['care_beneficiary', 'family_member']);
                    }),
                ],
            ],
            [
                'id.exists' => 'The selected user is either invalid or not a Care Beneficiary or Family Member.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.service-users.index')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or not a Care Beneficiary or Family Member.');
        }
    
        // Fetch the service user with both relationships
        $user = User::with(['familyMembersManagingCareBeneficiary.familyMember', 'managedCareBeneficiaries.careBeneficiary'])->findOrFail($id);

        // Pass user & family members to the view
        return view('admin.pages.view-serviceuser', compact('user'));

    }
    
    

    public function create()
    {
        return view('admin.pages.create-serviceusers');
    }

    public function store(RegisterUserRequest $request)
    {

        $role = $request->input('role', 'care_beneficiary'); 
        $password_change_required = 1;

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role, $password_change_required);

        return redirect()->route('admin.service-users.index')->with('success', 'Care Beneficiary added successfully! Care Beneficiary can check their email to verify their account.');

    }

    
}
