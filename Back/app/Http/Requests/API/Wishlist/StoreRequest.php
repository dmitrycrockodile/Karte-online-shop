<?php

namespace App\Http\Requests\Api\Wishlist;

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
         'product_id' => 'required|exists:products,id',
         'user_id' => 'required|exists:users,id',
      ];
   }

   public function messages()
   {
      return [
         'product_id.required' => 'Please add the product id',
         'product_id.exists' => 'There is no product with this id',
         'user_id.required' => 'Please add the user id',
         'user_id.exists' => 'There is no user with this id',
      ];
   }
}
