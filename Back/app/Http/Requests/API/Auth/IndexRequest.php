<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'nullable|email',
            'password' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please fill the "email" field',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Please enter your password',
            'password.string' => '"Password" field must be a string',
        ];
    }
}
