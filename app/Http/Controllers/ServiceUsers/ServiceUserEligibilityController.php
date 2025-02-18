<?php

namespace App\Http\Controllers\ServiceUsers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EligibilityQuestion;
use App\Models\EligibilityResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceUserEligibility;
use App\Traits\AuthUserViewSharedDataTrait;

class ServiceUserEligibilityController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    
    // Show the eligibility page
    public function index()
    {
        return view('serviceusers.pages.eligibility');
    }

    // Handle eligibility request for self
    public function requestForSelf()
    {

        
        $userId = Auth::id();
        $care_beneficary_user = User::find($userId);
        $user_eligibility_status = $care_beneficary_user->eligibility?->status;

        $questions = EligibilityQuestion::all();
        $totalQuestions = $questions->count();
        $responses = EligibilityResponse::where('user_id', $userId)
            ->where('completed_by_user', $userId)
            ->get()->keyBy('question_id');
                    
        return view('serviceusers.pages.eligibility-self', compact('care_beneficary_user','user_eligibility_status','questions', 'responses', 'totalQuestions'));
    }


    public function saveResponse(Request $request)
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
                'completed_by_user' => $userId,
                'question_id' => $questionId
            ],
            [
                'answer' => $answer,
                'child_answer' => $childAnswer,
            ]
        );
       // Calculate total questions and user responses
       $totalQuestions = EligibilityQuestion::count();
       $totalResponses = EligibilityResponse::where('user_id', $userId)
           ->where('completed_by_user', $userId)
           ->count();
   
       // If the user has completed all questions, create or update the eligibility record
       if ($totalQuestions > 0 && $totalQuestions === $totalResponses) {
           ServiceUserEligibility::updateOrCreate(
               ['user_id' => $userId],
               [
                   'status' => 'pending',
                   'note' => null,
                   'eligibility_checked_by' => null
               ]
           );
       }
        
        return response()->json(['success' => true, 'message' => 'Response saved successfully.']);
    }
    
    

    // Handle eligibility request for family member
    public function requestForFamily()
    {
        return view('serviceusers.pages.eligibility-family');
    }
}
