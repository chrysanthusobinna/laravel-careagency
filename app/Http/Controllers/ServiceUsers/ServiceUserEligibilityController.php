<?php

namespace App\Http\Controllers\ServiceUsers;

use App\Models\User;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Models\EligibilityRequest;
use App\Models\EligibilityQuestion;
use App\Models\EligibilityResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthUserViewSharedDataTrait;
use App\Http\Requests\EligibilityResponseRequest;

class ServiceUserEligibilityController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        $this->shareViewData();
    }



    public function eligibilityCareBeneficiaryShow()
    {
        $userId = Auth::id();
        $care_beneficiary_user = User::findOrFail($userId);
    
        $data = $this->handleEligibility($care_beneficiary_user);
    
        if (isset($data['redirect'])) {
            return redirect()->to($data['redirect'])->with('error', $data['error']);
        }
    
        return view('serviceusers.pages.eligibility-carebeneficiary-show', $data);
    }
    

    // ELIGIBILITY FOR CARE BENEFICIARY SAVE RESPONSE

    public function eligibilityCareBeneficiarySave(EligibilityResponseRequest $request)
    {
        $userId = Auth::id();
        return $this->saveEligibilityResponse($request, $userId);
    }
    
    

    // Handle eligibility request for family member
    public function EligibilityFamilyList()
    {
        $user = Auth::user();
        $familyMembers = $user->managedCareBeneficiaries()->with('careBeneficiary')->get();

        return view('serviceusers.pages.eligibility-family-list', compact('familyMembers'));
    }


    
    public function eligibilityFamilyShow(Request $request, $userId)
    {
        $user = Auth::user();
    
        // Check if the authenticated user is a family member of the requested user ID
        $familyMember = FamilyMember::where('family_member_id', $user->id)->where('care_beneficiary_id', $userId)->first();
    
        if (!$familyMember) {
            return redirect()->route('serviceuser.dashboard')->with('error', 'You are not authorized to access this page.');
        }
    
        $care_beneficiary_user = User::where('id', $userId)->where('role', 'care_beneficiary')->firstOrFail();
        $data = $this->handleEligibility($care_beneficiary_user);
    
        if (isset($data['redirect'])) {
            return redirect()->to($data['redirect'])->with('error', $data['error']);
        }
    
        return view('serviceusers.pages.eligibility-family-show', $data);
    }
    


    // Eligibility for Family Member
    public function eligibilityFamilySave(EligibilityResponseRequest $request, $userId)
    {
        $user = Auth::user();

        // Check if the authenticated user is a family member of the requested user ID
        $familyMember = FamilyMember::where('family_member_id', $user->id)->where('care_beneficiary_id', $userId)->first();

        if (!$familyMember) {
            return redirect()->route('serviceuser.dashboard')
                ->with('error', 'You are not authorized to access this page.');
        }

        return $this->saveEligibilityResponse($request, $userId);
    }





    // SHOW ELIGIBILITY RESPONSES (USED FOR BOTH FAMILY & CARE BENEFICIARY)

    private function handleEligibility(User $care_beneficiary_user)
    {
        $userId = $care_beneficiary_user->id;
        $user_eligibility_status = $care_beneficiary_user->eligibility?->status;
    
        // Get all trashed question IDs
        $trashedQuestions = EligibilityQuestion::onlyTrashed()->pluck('id')->toArray();
    
        // Get all active questions
        $questions = EligibilityQuestion::all();
        $totalQuestions = $questions->count();
    
        // Get user responses
        $responses = EligibilityResponse::where('user_id', $userId)->get()->keyBy('question_id');
    
        // If eligibility status is NOT NULL and responses are EMPTY, delete the eligibility request
        if ($user_eligibility_status !== null && $responses->isEmpty()) {
            $care_beneficiary_user->eligibility->forceDelete();
            return ['redirect' => route('serviceusers.eligibility-self'), 'error' => 'You need to complete the eligibility request.'];
        }
    
        // Only check for trashed questions if responses exist
        if (!$responses->isEmpty()) {
            foreach ($responses as $questionId => $response) {
                if (in_array($questionId, $trashedQuestions)) {
                    $response->forceDelete();
                    unset($responses[$questionId]);
                }
            }
        }
    
        // Return the collected data
        return [
            'care_beneficiary_user' => $care_beneficiary_user,
            'user_eligibility_status' => $user_eligibility_status,
            'questions' => $questions,
            'responses' => $responses,
            'totalQuestions' => $totalQuestions
        ];
    }
    



 
    // SAVE ELIGIBILITY RESPONSES (USED FOR BOTH FAMILY & CARE BENEFICIARY)
    private function saveEligibilityResponse(EligibilityResponseRequest $request, $userId)
    {
        $questionId = $request->input('question_id');

        // Ensure at least one of the fields is present
        $answer = $request->input('answer');
        $childAnswer = $request->input('child_answer');

        if (empty($answer) && empty($childAnswer)) {
            return response()->json(['success' => false, 'message' => 'You need to provide a response.'], 422);
        }

        // Check if answer is "others" and child_answer is empty
        if (!is_array($answer) && strtolower($answer) === 'others' && empty($childAnswer)) {
            return response()->json(['success' => false, 'message' => 'Please provide more details when selecting "Others".'], 422);
        }

        // Convert multiple answers to JSON format
        $answer = is_array($answer) ? json_encode($answer) : $answer;

        // Save or update the eligibility response
        EligibilityResponse::updateOrCreate(
            [
                'user_id' => $userId,
                'question_id' => $questionId
            ],
            [
                'answer' => $answer,
                'child_answer' => $childAnswer,
            ]
        );

        // Check if all questions are answered
        $totalQuestions = EligibilityQuestion::count();
        $totalResponses = EligibilityResponse::where('user_id', $userId)->count();

        // If all questions are answered, update or create an eligibility request
        if ($totalQuestions > 0 && $totalQuestions === $totalResponses) {
            EligibilityRequest::updateOrCreate(
                ['user_id' => $userId],
                [
                    'status' => 'pending',
                    'note' => null,
                    'eligibility_checked_by' => null,
                    'submitted_by' => Auth::id(),  
                ]
            );
        }

        return response()->json(['success' => true, 'message' => 'Response saved successfully.']);
    }

 


}
 