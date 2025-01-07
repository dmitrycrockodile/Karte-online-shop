<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'percentage' => 'required|integer|min:1|max:100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please write a coupon title',
            'title.string' => 'Coupon must be a string',
            'percentage.required' => 'Please write a percentage',
            'percentage.integer' => 'Percentage must be an integer',
            'percentage.min' => 'Min percent for coupon is 1',
            'percentage.max' => 'Max percent for coupon is 100'
        ];
    }
}
