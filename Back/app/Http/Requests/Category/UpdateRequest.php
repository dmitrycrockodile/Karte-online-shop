<?php

namespace App\Http\Requests\Category;

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
            'title' => 'required|string',
            'coupons' => 'nullable|array',
            'coupons.*' => 'nullable|integer|exists:coupons,id',
            'preview_image' => 'nullable|file',
            'banner' => 'nullable|file',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please write the title',
            'title.string' => 'Title must be a string',
            'coupons.array' => 'Coupons must be an array',
            'preview_image.file' => 'File must be an image (.jpeg, .png, .jpg, .gif)',
            'banner.file' => 'File must be an image (.jpeg, .png, .jpg, .gif)',
        ];
    }
}
