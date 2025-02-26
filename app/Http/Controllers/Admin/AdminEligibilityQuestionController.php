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
        $questions = EligibilityQuestion::latest()->get();
        return view('admin.pages.eligibility-questions', compact('questions'));
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
            'question' => 'required|string',
            'more_details' => 'nullable|string',
            'type' => 'required|in:radio,checkbox,textarea',
            'options' => 'nullable|array|required_if:type,radio|required_if:type,checkbox',
        ]);
    
        // Filter out empty options
        $filteredOptions = [];
        if (in_array($request->type, ['radio', 'checkbox']) && !empty($request->options)) {
            $filteredOptions = array_filter($request->options, function ($option) {
                return !empty(trim($option)); // Remove empty and whitespace-only options
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
        $question = EligibilityQuestion::findOrFail($id);
        return view('admin.pages.eligibility-questions-show', compact('question'));
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
