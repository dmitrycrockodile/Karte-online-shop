<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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
         'email' => 'required|email|unique:subscribers,email',
      ];
   }

   public function messages()
   {
      return [
         'email.required' => 'Please fill the "email" field',
         'email.email' => 'Please enter correct email address',
         'email.unique' => 'This email already subscribed!',
      ];
   }
}