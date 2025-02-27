<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EligibilityResponseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ensure authorization is handled elsewhere
    }

    public function rules()
    {
        return [
            'question_id' => 'required|exists:eligibility_questions,id',
            'answer' => 'required',
            'answer.*' => 'string',
            'child_answer' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'question_id.required' => 'Question ID is required.',
            'question_id.exists' => 'Invalid question ID.',
            'answer.required_if' => 'Answer is required for multiple choice questions.',
            'child_answer.required_without' => 'Either an answer or a child answer is required.',
        ];
    }
}
