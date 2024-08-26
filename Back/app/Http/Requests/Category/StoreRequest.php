<?php

namespace App\Http\Requests\Category;

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
            'title' => 'required|string',
            'coupons' => 'nullable|array',
            'coupons.*' => 'nullable|integer|exists:coupons,id',
            'preview_image' => 'required|image',
            'banner' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please write the title',
            'title.string' => 'Title must be a string',
            'coupons.array' => 'Coupons must be an array',
            'preview_image.required' => 'Please upload the image',
            'preview_image.image' => 'File must be an image (.jpeg, .png, .jpg, .gif)',
            'banner.required' => 'Please upload the banner image',
            'banner.image' => 'File must be an image (.jpeg, .png, .jpg, .gif)',
        ];
    }
}
