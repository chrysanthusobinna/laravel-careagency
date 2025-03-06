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
 
class AdminFamilyMemberController extends Controller
{
    use UserCreateTrait;
    use UserListTrait;
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        $this->shareViewData();
    }

    public function index()
    {
        $familyMembers = User::where('role', 'family_member')->get();
    
        $totalCount = $familyMembers->count();
    
        $activeCount = $familyMembers->where('status', 1)->count();
    
    
        return view('admin.pages.familymember-list', compact('familyMembers', 'totalCount', 'activeCount'));
    }
    
  
    public function show($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('carebeneficiary.list')->with('error', 'User does not exist.');
        }
    
        if ($user->role !== 'family_member') {
            return redirect()->route('carebeneficiary.list')->with('error', 'User is not a valid Family Member.');
        }
    
        $familyMember = User::with('managedCareBeneficiaries')->findOrFail($id);
    
        return view('admin.pages.familymember-show', compact('familyMember'));
    }
    
    

    public function create()
    {
        return view('admin.pages.familymember-create');
    }

    public function store(RegisterUserRequest $request)
    {

        $role = $request->input('role', 'family_member'); 
        $password_change_required = 1;

        // Call trait method to create the user
        $user = $this->createUser($request->validated(), $role, $password_change_required);

        return redirect()->route('admin.familymember.index')->with('success', 'Family Member User added successfully! Family Member User can check their email to verify their account.');

    }

    
}
