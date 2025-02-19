<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class ValidateServiceUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all authenticated users to make this request
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'exists:users,id',
                Rule::exists('users', 'id')->where(function ($query) {
                    return $query->where('role', 'service_user');
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_id.exists' => 'The selected user is either invalid or not a service user.',
        ];
    }
}
