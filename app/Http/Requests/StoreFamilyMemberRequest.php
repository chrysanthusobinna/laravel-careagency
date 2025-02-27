<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreFamilyMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'county' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'relationship_type' => 'required|string|max:255',
            'password' => 'nullable|string', // Add this
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => Str::random(12), // Remove bcrypt() here
        ]);
    }
}
