<?php

namespace App\Http\Requests\Api\CartItem;

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
         'product_id' => 'required|exists:products,id',
         'quantity' => 'required|integer',
         'attributes' => 'nullable|array',
         'withCoupon' => 'nullable|boolean',
      ];
   }

   public function messages()
   {
      return [
         'product_id.required' => 'Please add the product id',
         'product_id.exists' => 'There is no product with this id',
         'quantity.required' => 'Please add the quantity of the product',
         'quantity.integer' => 'Quantity must be a number',
         'attributes.array' => 'Attributes field must be an array',
      ];
   }
}
