<?php

namespace App\Http\Requests\Product;

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
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|image',
            'price' => 'required|integer',
            'old_price' => 'nullable|integer',
            'count' => 'required|integer',
            'is_published' => 'nullable|boolean',
            'category_id' => 'nullable|integer|exists:categories,id',
            'colors' => 'required|array',
            'colors.*' => 'required|integer|exists:colors,id',
            'images' => 'required|array',
            'images.*' => 'required|image',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please write the title',
            'title.string' => 'Title must be a string',
            'description.required' => 'Please write the description',
            'description.string' => 'Description must be a string',
            'content.required' => 'Please write the content',
            'content.string' => 'Content must be a string',
            'preview_image.required' => 'Please upload the image',
            'preview_image.image' => 'File must be an image (.jpeg, .png, .jpg, .gif)',
            'price.required' => 'Please enter the price',
            'price.integer' => 'Price must be an integer',
            'old_price.integer' => 'Old price must be an integer',
            'count.required' => 'Please enter the count',
            'count.integer' => 'Count must be an integer',
            'is_published.boolean' => 'Value must be true or false',
            'category_id.integer' => 'Category id must be an integer',
            'category_id.exists' => 'It seems like this categoru does not exist',
            'colors.required' => 'Please choose the colors',
            'colors.array' => 'Colors must be an array',
            'images.required' => 'Please upload the images',
            'images.array' => 'Images must be an array',
            'images.image' => 'File must be an image (.jpeg, .png, .jpg, .gif)',
            'tags.array' => 'Tags must be an array',
        ];
    }
}
