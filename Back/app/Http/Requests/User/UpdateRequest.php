<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'surname.string' => '"Surname" field must be a string',
            'patronymic.string' => '"Patronymic" field must be a string',
            'age.integer' => '"Age" field must be an integer',
            'address' => '"Address" field must be a string',
            'sex' => '"Sex" field must be an integer',
        ];
    }
}
