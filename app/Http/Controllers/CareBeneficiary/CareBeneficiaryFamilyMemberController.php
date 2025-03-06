<?php

namespace App\Http\Controllers\CareBeneficiary;

use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserCreateTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthUserViewSharedDataTrait;
use App\Http\Requests\StoreFamilyMemberRequest;
use App\Http\Requests\UpdateUserRequest;
 
class CareBeneficiaryFamilyMemberController extends Controller
{
    use AuthUserViewSharedDataTrait;
    use UserListTrait;
    use UserCreateTrait;

    public function __construct()
    {
        $this->shareViewData();
    }
   

    // AUTH USER FAMILY MEMBERS  LIST
    public function index()
    {
        $familyMembers = FamilyMember::where('care_beneficiary_id', Auth::id())->with('familyMember')->get();
        return view('carebeneficiary.pages.list-family-members', compact('familyMembers'));
    }
    

    
    // SHOW FAMILY MEMBER PROFILE
    public function showFamilyMemberProfile($id)
    {

        $familyMember = FamilyMember::where('care_beneficiary_id', Auth::id())
                                    ->where('family_member_id', $id)
                                    ->with(['familyMember', 'careBeneficiary'])
                                    ->firstOrFail();
        return view('carebeneficiary.pages.view-familymember-user', compact('familyMember'));
    }
    
    

    // UNLINK FAMILY MEMEBER REQUEST 
    public function unlinkFamilyMember($id)
    {
        return redirect()->back()->with('error', 'If you need to remove a family member, please contact our staff.');
    }




}
