<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AlphaOnly implements ValidationRule
{
    /** 
    * Validate the given attribute using the provided value. 
    * 
    * @param string $attribute
    * @param mixed $value 
    * @param \Closure $fail 
    * @return void 
    */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[a-zA-Z]+$/', $value)) { 
            $fail('The :attribute may only contain alphabetic characters.'); 
        }
    }
}