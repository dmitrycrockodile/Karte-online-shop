<?php

namespace App\Service;

use Illuminate\Support\Facades\Mail;
use App\Mail\CustomVerifyEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService {
   /**
    * Method tries to register the user
    *
    * @param array $data
    * @return bool
   */
   public function register(array $data): bool {
      try {
         User::firstOrCreate([
            'email' => $data['email']
         ], [
            ...$data,
            'password' => Hash::make($data['password'])
         ]);

         Mail::to($data['email'])->send(new CustomVerifyEmail($data['name'], $data['email']));

         return true;
      } catch (\Exception $e) {
         Log::error("CategoryService Store Error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);
         
         return false;
      }
   }

   /**
    * Method tries to login the user
    *
    * @param array $data
    * @return bool
   */
  public function login() {

  }
}