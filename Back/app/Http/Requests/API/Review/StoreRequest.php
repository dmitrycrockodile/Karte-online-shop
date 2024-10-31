<?php

namespace App\Http\Requests\Api\Review;

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
         'rating' => 'required|integer',
         'title' => 'required|string',
         'product_id' => 'required|exists:products,id',
         'body' => 'nullable|string',
      ];
   }

   public function messages()
   {
      return [
         'rating.required' => 'Please choose the product rating',
         'title.required' => 'Please enter the title',
         'product_id.required' => 'Please add the product id',
         'product_id.exists' => 'There is no product with this id',
      ];
   }
}
