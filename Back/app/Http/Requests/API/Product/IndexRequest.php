<?php

namespace App\Http\Requests\API\Product;

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
            'categories' => 'nullable|array',
            'colors' => 'nullable|array',
            'prices' => 'nullable|array',
            'tags' => 'nullable|array',
            'page' => 'nullable|integer',
            'dataPerPage' => 'nullable|integer',
            'sortby' => 'nullable|string',
            'title' => 'nullable|string',
        ];
    }
}
