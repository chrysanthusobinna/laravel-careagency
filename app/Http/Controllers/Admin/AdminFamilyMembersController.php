<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;  
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminFamilyMembersController extends Controller
{
    use AuthUserViewSharedDataTrait;
    use UserListTrait;


    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    
    public function index()
    {
        $familyMembers = FamilyMember::with(['familyMember', 'careBeneficiary'])->get();
        return view('admin.pages.family_members', compact('familyMembers'));
    }

    public function unlink(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:family_members,id',
        ]);

        $familyMember = FamilyMember::findOrFail($request->id);
        $familyMember->delete();

        return redirect()->back()->with('success', 'Family member unlinked successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:family_members,id',
            'relationship_type' => 'required|string|max:255',
        ]);

        $familyMember = FamilyMember::findOrFail($request->id);
        $familyMember->update(['relationship_type' => $request->relationship_type]);

        return redirect()->back()->with('success', 'Relationship updated successfully.');
    }



    public function searchServiceUser(Request $request, $role)
    {
        if (!in_array($role, ['service_user', 'family_member'])) {
            return response()->json(['success' => false, 'message' => 'Invalid role provided.'], 400);
        }
    
        $query = $request->query('query');
    
        $familyMembers = User::where('role', $role)
            ->where(function ($q) use ($query) {
                $q->where('first_name', 'LIKE', "%{$query}%")
                  ->orWhere('last_name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%");
            })
            ->limit(10)
            ->get(['id', 'first_name', 'last_name', 'email']);
    
        return response()->json($familyMembers);
    }
    
    
    public function addFamilyMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'family_member_id' => 'required|exists:users,id',
            'care_beneficiary_id' => 'required|exists:users,id',
            'relationship_type' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Invalid input. Please check the form fields.'
            ], 422);
        }
    
        // Check if the family member already exists, including soft deleted ones
        $existing = FamilyMember::withTrashed()
                                ->where('family_member_id', $request->family_member_id)
                                ->where('care_beneficiary_id', $request->care_beneficiary_id)
                                ->first();
    
        if ($existing) {
            if ($existing->trashed()) {
                $existing->restore();
                $existing->update(['relationship_type' => $request->relationship_type]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Family member restored successfully.',

                ]);
            }
    
            return response()->json([
                'success' => false,
                'message' => 'This family member is already linked to this service user.',
            ], 409); // 409 Conflict status
        }
    
        // Create a new Family Member entry if none exists
        FamilyMember::create([
            'family_member_id' => $request->family_member_id,
            'care_beneficiary_id' => $request->care_beneficiary_id,
            'relationship_type' => $request->relationship_type,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Family member added successfully.',
        ]);
    }
    
    

    
}
