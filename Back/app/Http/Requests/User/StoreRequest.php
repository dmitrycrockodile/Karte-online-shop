<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'sex' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please fill the "name" field',
            'name.string' => '"Name" field must be a string',
            'email.required' => 'Please fill the "email" field',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'User with this email exists',
            'password.required' => 'Please enter your password',
            'password.string' => '"Password" field must be a string',
            'password.confirmed' => 'Please confirm your password',
            'surname.string' => '"Surname" field must be a string',
            'patronymic.string' => '"Patronymic" field must be a string',
            'age.integer' => '"Age" field must be an integer',
            'address' => '"Address" field must be a string',
            'sex' => '"Sex" field must be an integer',
        ];
    }
}
