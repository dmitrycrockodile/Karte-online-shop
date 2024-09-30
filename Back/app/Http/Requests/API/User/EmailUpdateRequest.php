<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

class EmailUpdateRequest extends FormRequest
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
         'email' => 'required|email|unique:users,email',
         'password' => 'required|string',
      ];
   }

   public function messages()
   {
      return [
         'email.required' => 'Please fill the "email" field',
         'email.email' => 'Please enter correct email address',
         'email.unique' => 'User with this email already exists',
         'password.required' => 'Please fill the "password" field',
         'password.string' => 'Password must be a string'
      ];
   }
}