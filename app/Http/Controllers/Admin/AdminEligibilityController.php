<?php

namespace App\Http\Controllers\Admin;

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
        // Validate user ID to ensure it's a valid service user
        $validator = Validator::make(
            ['user_id' => $user_id], // Data being validated
            [
                'user_id' => [
                    'required',
                    'exists:users,id',
                    Rule::exists('users', 'id')->where(function ($query) {
                        return $query->where('role', 'service_user');
                    }),
                ],
            ],
            [
                'user_id.exists' => 'The user is either invalid or not a service user.',
            ]
        );
    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->route('admin.eligibility-request')
                ->withErrors($validator)
                ->with('error', 'The selected user is either invalid or not a service user.');
        }
    
        // Fetch the eligibility request
        $eligibilityRequest = EligibilityRequest::where('user_id', $user_id)
            ->with(['user', 'checkedBy', 'submittedBy'])
            ->first();

        // Fetch all responses related to this user
        $responses = EligibilityResponse::where('user_id', $user_id)
            ->with('question')
            ->orderBy('updated_at', 'asc')
            ->get();

        // If no eligibility request or responses exist, return with an error message
        if (!$eligibilityRequest || $responses->isEmpty()) {
            return redirect()->route('admin.eligibility-request')
                ->with('error', 'No eligibility request or responses found for this user.');
        }

    
        return view('admin.pages.view-eligibility-request-response', compact('eligibilityRequest', 'responses'));
    }
    


    public function submitReview(Request $request, $user_id)
    {
        $request->validate([
            'status' => 'required|in:pending,eligible,not_eligible',
        ]);

        $eligibilityRequest = EligibilityRequest::where('user_id', $user_id)->firstOrFail();
        $eligibilityRequest->update([
            'status' => $request->status,
            'eligibility_checked_by' => Auth::id(), // Set the admin who reviewed it
        ]);

        return redirect()->back()->with('success', 'Eligibility status updated successfully.');
    }

    public function deleteEligibility($user_id)
    {
        EligibilityResponse::where('user_id', $user_id)->delete();
        EligibilityRequest::where('user_id', $user_id)->delete();

        return redirect()->route('admin.eligibility-request')->with('success', 'Eligibility request and responses deleted.');
    }
    
}
