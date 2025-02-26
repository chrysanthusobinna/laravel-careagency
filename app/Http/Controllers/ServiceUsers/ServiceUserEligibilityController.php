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

class ServiceUserEligibilityController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    
    // Handle eligibility request for self
    public function EligibilityForSelf()
    {

        
        $userId = Auth::id();
        $care_beneficiary_user = User::find($userId);
        $user_eligibility_status = $care_beneficiary_user->eligibility?->status;

        $questions = EligibilityQuestion::all();
        $totalQuestions = $questions->count();
        $responses = EligibilityResponse::where('user_id', $userId)->get()->keyBy('question_id');
                    
        return view('serviceusers.pages.eligibility-self', compact('care_beneficiary_user','user_eligibility_status','questions', 'responses', 'totalQuestions'));
    }


    public function EligibilityForSelfSaveResponse(Request $request)
    {
        $userId = Auth::id();
        $questionId = $request->input('question_id');
    
        // Validate that either 'answer' or 'child_answer' is provided
        $request->validate([
            'question_id' => 'required|exists:eligibility_questions,id',
            'answer' => 'nullable',
            'answer.*' => 'string', 
            'child_answer' => 'nullable|string',
        ], [
            'question_id.required' => 'Question ID is required.',
            'question_id.exists' => 'Invalid question ID.',
            'answer.required_without' => 'Either an answer or a child answer is required.',
            'child_answer.required_without' => 'Either a child answer or an answer is required.',
        ]);

    
        // Ensure at least one of the fields is present
        $answer = $request->input('answer');
        $childAnswer = $request->input('child_answer');

        // Validate response presence
        if (empty($answer) && empty($childAnswer)) {
            return response()->json(['success' => false, 'message' => 'You need to provide a response.'], 422);
        }

        // Check if answer is "others" and child_answer is empty
        if (!is_array($answer) && strtolower($answer) === 'others' && empty($childAnswer)) {
            return response()->json(['success' => false, 'message' => 'Please provide more details when selecting "Others".'], 422);
        }

        $answer = is_array($request->input('answer')) ? json_encode($request->input('answer')) : $request->input('answer');
        $childAnswer = $request->input('child_answer');
    
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
       // Calculate total questions and user responses
       $totalQuestions = EligibilityQuestion::count();
       $totalResponses = EligibilityResponse::where('user_id', $userId)->count();
   
        // If the user has completed all questions, create or update the eligibility record
        if ($totalQuestions > 0 && $totalQuestions === $totalResponses) {
            EligibilityRequest::updateOrCreate(
                ['user_id' => $userId],
                [
                    'status' => 'pending',
                    'note' => null,
                    'eligibility_checked_by' => null,
                    'submitted_by' => $userId,  
                ]
            );
        }

        
        return response()->json(['success' => true, 'message' => 'Response saved successfully.']);
    }
    
    

    // Handle eligibility request for family member
    public function EligibilityForFamily()
    {
        $user = Auth::user();
        $familyMembers = $user->managedCareBeneficiaries()->with('careBeneficiary')->get();

        return view('serviceusers.pages.eligibility-family-list', compact('familyMembers'));
    }


    public function FamilyForEligibilityView(Request $request, $userId)
    {
        $user = Auth::user();
    
        // Check if the authenticated user is a family member of the requested user ID
        $familyMember = FamilyMember::where('family_member_id', $user->id)->where('care_beneficiary_id', $userId)->first();
    
        if (!$familyMember) {
            return redirect()->route('serviceuser.dashboard')->with('error', 'You are not authorized to access the page.');
        }
    
        // Get care beneficiary user details
        $care_beneficiary_user = User::where('id', $userId)->where('role', 'care_beneficiary')->firstOrFail();
        $user_eligibility_status = $care_beneficiary_user->eligibility?->status;
    
        $questions = EligibilityQuestion::all();
        $totalQuestions = $questions->count();
        $responses = EligibilityResponse::where('user_id', $userId)->get()->keyBy('question_id');
    
        return view('serviceusers.pages.eligibility-family-view', compact('care_beneficiary_user', 'user_eligibility_status', 'questions', 'responses', 'totalQuestions'));
    }
    


    public function EligibilityForFamilySaveResponse(Request $request, $userId)
    {
        $user = Auth::user();
    
        // Check if the authenticated user is a family member of the requested user ID
        $familyMember = FamilyMember::where('family_member_id', $user->id)->where('care_beneficiary_id', $userId)->first();
    
        if (!$familyMember) {
            return redirect()->route('serviceuser.dashboard')->with('error', 'You are not authorized to access the page.');
        }

        $care_beneficiary_user = User::where('id', $userId)->where('role', 'care_beneficiary')->firstOrFail();

        //$userId = request user->id;
        $questionId = $request->input('question_id');
    
        // Validate that either 'answer' or 'child_answer' is provided
        $request->validate([
            'question_id' => 'required|exists:eligibility_questions,id',
            'answer' => 'nullable',
            'answer.*' => 'string', 
            'child_answer' => 'nullable|string',
        ], [
            'question_id.required' => 'Question ID is required.',
            'question_id.exists' => 'Invalid question ID.',
            'answer.required_without' => 'Either an answer or a child answer is required.',
            'child_answer.required_without' => 'Either a child answer or an answer is required.',
        ]);

    
        // Ensure at least one of the fields is present
        $answer = $request->input('answer');
        $childAnswer = $request->input('child_answer');

        // Validate response presence
        if (empty($answer) && empty($childAnswer)) {
            return response()->json(['success' => false, 'message' => 'You need to provide a response.'], 422);
        }

        // Check if answer is "others" and child_answer is empty
        if (!is_array($answer) && strtolower($answer) === 'others' && empty($childAnswer)) {
            return response()->json(['success' => false, 'message' => 'Please provide more details when selecting "Others".'], 422);
        }

        $answer = is_array($request->input('answer')) ? json_encode($request->input('answer')) : $request->input('answer');
        $childAnswer = $request->input('child_answer');
    
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
       // Calculate total questions and user responses
       $totalQuestions = EligibilityQuestion::count();
       $totalResponses = EligibilityResponse::where('user_id', $userId)->count();
   
        // If the user has completed all questions, create or update the eligibility record
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
 