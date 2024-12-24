<?php

namespace App\Http\Requests\API\User;

use App\Rules\AlphaOnly;
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
            'name' => ['required', 'string', new AlphaOnly],
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'sex' => 'nullable|string',
            'address' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'age' => 'nullable|integer',
            'phone_number' => 'nullable|string|regex:/^\+[\d\s]+$/',
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
            'phone_number.regex' => 'Phone number must start from "+"',
        ];
    }
}
