<?php

namespace App\Http\Controllers\FamilyMember;

use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Traits\UserCreateTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthUserViewSharedDataTrait;
use App\Http\Requests\StoreFamilyMemberRequest;
use App\Http\Requests\UpdateUserRequest;
 
class FamilyMemberController extends Controller
{
    use AuthUserViewSharedDataTrait;
    use UserListTrait;
    use UserCreateTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }
   

    // AUTH USER FAMILY MEMBERS  
    public function index()
    {
        $user = Auth::user();  
    
        $familyMembers = collect();

        $familyMembers = FamilyMember::where('family_member_id', $user->id)->with('careBeneficiary')->get();
   
    
        return view('familymember.pages.list-family-members', compact('familyMembers'));
    }
    

    // ADD A FAMILY MEMBER
    public function showAddFamilyMemberForm()
    {
    
        return view('familymember.pages.add-family-member');
    }

    // Store a newly created family member
    public function storeFamilyMember(StoreFamilyMemberRequest $request)
    {
        $user = Auth::user();
    
        $role = 'care_beneficiary';
        $password_change_required = 1;
    
        $user = $this->createUser($request->validated(), $role, $password_change_required);
    
        // Store in FamilyMember model
        FamilyMember::create([
            'family_member_id' => Auth::id(),
            'care_beneficiary_id' => $user->id,
            'relationship_type' => $request->input('relationship_type'),
        ]);
    
        $message = 'Account added successfully! ' . $user->first_name . ' can visit the main site to reset their password and activate their account if they need to manage it.';
    
        return redirect()->route('familymember.care-beneficiary.show', $user->id)->with('success', $message);
    }
    
    // Show family member profile
    public function showFamilyMemberProfile($id)
    {
        $familyMember = FamilyMember::where('family_member_id', Auth::id())
                                    ->where('care_beneficiary_id', $id)
                                    ->with(['familyMember', 'careBeneficiary'])
                                    ->firstOrFail();
    
        // Pass the familyMember variable to the view
        return view('familymember.pages.view-familymember-user', compact('familyMember'));
    }
    

    // Show edit family member profile
    public function editFamilyMember($id)
    {
        $user = Auth::user();
    
        $familyMember = FamilyMember::where('family_member_id', Auth::id())->where('care_beneficiary_id', $id)->with('careBeneficiary')->firstOrFail();

        return view('familymember.pages.edit-family-member', compact('familyMember'));
    }

 
    // Update family member profile
    public function updateFamilyMember(UpdateUserRequest $request, $id)
    {
        $familyMember = FamilyMember::where('family_member_id', Auth::id())->where('care_beneficiary_id', $id)->firstOrFail();
    
        $familyMember->careBeneficiary->update($request->validated());
    
        $familyMember->update([
            'relationship_type' => $request->input('relationship_type'),
        ]);
    
        return redirect()->route('familymember.care-beneficiary.show', $id)->with('success', 'Profile updated successfully!');
    }
    


    // Method to handle unlink request 
    public function unlinkFamilyMember($id)
    {
        return redirect()->back()->with('error', 'If you need to remove a family member, please contact our staff.');
    }




}
