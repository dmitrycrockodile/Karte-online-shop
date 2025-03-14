<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
         'new_password' => 'required|string',
         'password' => 'required|string',
      ];
   }

   public function messages()
   {
      return [
         'new_password.required' => 'Please fill the "new password" field',
         'new_password.string' => 'Password must be a string',
         'password.required' => 'Please fill the "password" field',
         'password.string' => 'Password must be a string',
      ];
   }
}