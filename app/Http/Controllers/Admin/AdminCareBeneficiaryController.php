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
 
class AdminCareBeneficiaryController extends Controller
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
        $careBeneficiaries = User::where('role', 'care_beneficiary')->get();
        
        $totalCount = $careBeneficiaries->count();
        
        $activeCount = $careBeneficiaries->where('status', 1)->count();
        
        $eligibleCount = EligibilityRequest::where('status', 'eligible')->count();
        
        return view('admin.pages.care-beneficiary-list', compact('careBeneficiaries', 'totalCount', 'activeCount', 'eligibleCount'));
    }
    
    public function show($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('carebeneficiary.list')->with('error', 'User does not exist.');
        }
    
        if ($user->role !== 'care_beneficiary') {
            return redirect()->route('carebeneficiary.list')->with('error', 'User is not a valid care beneficiary.');
        }
    
        $careBeneficiary = User::with('familyMembersManagingCareBeneficiary')->findOrFail($id);
    
        return view('admin.pages.care-beneficiary-show', compact('careBeneficiary'));
    }
    
    

    public function create()
    {
        return view('admin.pages.care-beneficiary-create');
    }

    public function store(RegisterUserRequest $request)
    {

        $role = 'care_beneficiary'; 
        $password_change_required = 1;

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role, $password_change_required);

        return redirect()->route('admin.care-beneficiary.index')->with('success', 'Care Beneficiary added successfully! Care Beneficiary can check their email to verify their account.');

    }

    
}
