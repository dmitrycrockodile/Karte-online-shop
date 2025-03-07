<?php

namespace App\Http\Requests\Api\Review;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
         'body' => 'nullable|string',
         'model' => 'required|string',
         'id' => 'required|integer',
      ];
   }

   public function messages()
   {
      return [
         'rating.required' => 'Please choose the product rating',
         'title.required' => 'Please enter the title',
         'id.required' => 'Please add the product id',
         'id.integer' => 'Please add a valid id',
      ];
   }

   public function checkCommentable() {
      $reviewable = config('reviewable');
      
      if (!isset($reviewable[$this->input('model')])) {
         Log::alert('Someone try to add review to unreviewable model!');

         throw ValidationException::withMessages([
            'model' => $this->input('model')
         ]);
      }

      $model = $reviewable[$this->input('model')]::findOrFail($this->input('id'));
      return $model;
   }
}
