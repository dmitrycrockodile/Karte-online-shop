<?php

namespace App\Http\Requests\Color;

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
            'title' => ['required', 'string', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please write the color',
            'title.string' => 'Color must be a string',
            'title.regex' => 'Color must start with "#" and be a HEX value',
        ];
    }
}
