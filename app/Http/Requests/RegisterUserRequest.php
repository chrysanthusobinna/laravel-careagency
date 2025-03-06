<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
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
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Modify input data before validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'first_name' => ucfirst(strtolower($this->first_name)),
            'middle_name' => $this->middle_name ? ucfirst(strtolower($this->middle_name)) : null,
            'last_name' => ucfirst(strtolower($this->last_name)),
            'email' => strtolower($this->email),
            'city' => ucfirst(strtolower($this->city)),
            'country' => ucfirst(strtolower($this->country)),
            'county' => ucfirst(strtolower($this->county)),
            'post_code' => strtoupper($this->post_code),
        ]);
    }
}
