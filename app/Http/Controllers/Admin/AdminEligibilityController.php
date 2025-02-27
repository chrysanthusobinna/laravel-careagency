<?php

namespace App\Http\Controllers\Admin;

use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Traits\UserListTrait;
use Illuminate\Validation\Rule;
use App\Models\EligibilityRequest;
use App\Models\EligibilityResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminEligibilityController extends Controller
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

        $eligibilityRequests = EligibilityRequest::with('user')->latest()->get();
 
        // Get eligibility request counts
        $allEligibilityCount = $eligibilityRequests->count();
        $pendingEligibilityCount = EligibilityRequest::where('status', 'pending')->count();
        $eligibleCount = EligibilityRequest::where('status', 'eligible')->count();


        return view('admin.pages.list-eligibility-request', compact('eligibilityRequests','allEligibilityCount', 'pendingEligibilityCount',  'eligibleCount'));
    }

    public function show(Request $request, $user_id)
    {
        // Validate user ID to ensure it's a valid care_beneficiary
        $validator = Validator::make(
            ['user_id' => $user_id], 
            [
                'user_id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->where('role', 'care_beneficiary');
                    }),
                ],
            ],
            [
                'user_id.exists' => 'The user is either invalid or not a Care Beneficiary.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.eligibility-request')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or not a Care Beneficiary.');
        }
    
        // Fetch the eligibility request
        $eligibilityRequest = EligibilityRequest::where('user_id', $user_id)->with(['user', 'checkedBy', 'submittedBy'])->first();

        // Fetch all responses related to this user
        $responses = EligibilityResponse::where('user_id', $user_id)->with('question')->orderBy('updated_at', 'asc')->get();


        if (!$eligibilityRequest) {
            return redirect()->route('admin.eligibility-request')->with('error', 'No eligibility request found.');
        }
        
        // If the eligibility request exists and there are no responses, hard delete the request
        if ($eligibilityRequest && $responses->isEmpty()) {
            $eligibilityRequest->forceDelete();
        
            return redirect()->route('admin.eligibility-request')->with('error', 'No eligibility request or responses found for this user.');
        }
    

        // Check if the form was submitted by someone other than Care Beneficiary
        $familyMemberRelation = null;
        if ($eligibilityRequest->submitted_by !== $eligibilityRequest->user_id) {
            $familyMemberRelation = FamilyMember::where('family_member_id', $eligibilityRequest->submitted_by)
                ->where('care_beneficiary_id', $user_id)
                ->with('familyMember')
                ->first();
        }
        
        return view('admin.pages.view-eligibility-request-response', compact('eligibilityRequest', 'responses', 'familyMemberRelation'));
    }



    public function submitReview(Request $request, $user_id)
    {
        $request->validate([
            'status' => 'required|in:pending,eligible,not_eligible',
        ]);

        $eligibilityRequest = EligibilityRequest::where('user_id', $user_id)->firstOrFail();
        $eligibilityRequest->update([
            'status' => $request->status,
            'eligibility_checked_by' => Auth::id(),  
        ]);

        return redirect()->back()->with('success', 'Eligibility status updated successfully.');
    }

    public function deleteEligibility($user_id)
    {
        EligibilityResponse::where('user_id', $user_id)->forceDelete();
        EligibilityRequest::where('user_id', $user_id)->forceDelete();        
    
        return redirect()->route('admin.eligibility-request')->with('success', 'Eligibility request and responses have been deleted.');
    }
    
    
}
