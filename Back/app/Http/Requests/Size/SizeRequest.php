<?php

namespace App\Http\Requests\Size;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
            'title' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please write the title',
            'title.string' => 'Title must be a string',
        ];
    }
}
