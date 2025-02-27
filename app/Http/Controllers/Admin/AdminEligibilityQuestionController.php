<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EligibilityQuestion;
use App\Http\Controllers\Controller;
use App\Traits\AuthUserViewSharedDataTrait;

class AdminEligibilityQuestionController extends Controller
{
    use AuthUserViewSharedDataTrait;

    public function __construct()
    {
        // Call the shareViewData method 
        $this->shareViewData();
    }

    // LIST ELIGIBILITY QUESTIONS.
    public function index()
    {
        $questions = EligibilityQuestion::orderBy('created_at', 'asc')->get();
        return view('admin.pages.eligibility-questions-list', compact('questions'));
    }

    /**
     * Show form to create a new eligibility question.
     */
    public function create()
    {
        return view('admin.pages.eligibility-questions-create');
    }

    /**
     * Store a new eligibility question.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'more_details' => 'nullable|string|max:255',
            'type' => 'required|in:radio,checkbox,textarea',
            'options' => [
                'nullable',
                'array',
                function ($attribute, $value, $fail) use ($request) {
                    if (in_array($request->type, ['radio', 'checkbox']) && empty(array_filter($value))) {
                        $fail('Options are required when type is radio or checkbox.');
                    }
                }
            ],
        ]);
    
        // Filter out empty options
        $filteredOptions = [];
        if (in_array($request->type, ['radio', 'checkbox']) && !empty($request->options)) {
            $filteredOptions = array_filter($request->options, function ($option) {
                return !empty(trim($option));  
            });
        }
    
        // Encode options only if there are valid options
        $options = !empty($filteredOptions) ? json_encode(array_values($filteredOptions)) : null;
    
        EligibilityQuestion::create([
            'question' => $request->question,
            'more_details' => $request->more_details,
            'type' => $request->type,
            'options' => $options,
        ]);
    
        return redirect()->route('admin.eligibility-questions.index')->with('success', 'Question added successfully.');
    }
    
    /**
     * Display a single eligibility question.
     */
    public function show($id)
    {
        // Get the current question
        $question = EligibilityQuestion::findOrFail($id);
    
        // Get the question number based on `created_at` order
        $questionNumber = EligibilityQuestion::where('created_at', '<', $question->created_at)->count() + 1;
    
        return view('admin.pages.eligibility-questions-show', compact('question', 'questionNumber'));
    }
    

    /**
     * Soft delete a question.
     */
    public function destroy($id)
    {
        $question = EligibilityQuestion::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.eligibility-questions.index')->with('success', 'Question deleted successfully.');
    }
}
