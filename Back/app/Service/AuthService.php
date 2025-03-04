<?php

namespace App\Service;

use Illuminate\Support\Facades\Mail;
use App\Mail\CustomVerifyEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\Register;

class AuthService {
   /**
    * Method tries to register the user and returns boolean value
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
         Log::error("Auth service register error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);
         
         return false;
      }
   }

   /**
    * Method tries to login the user and return array with 'success', 'message' or 'data' fields
    *
    * @param array $data
    * @return array
   */
   public function login(array $data): array {
      try {
         $user = User::whereEmail($data['email'])->first();

         if (!Hash::check($data['password'], $user->password)) {
            return [
               'success' => false,
               'message' => 'Incorrect password.',
            ];
         }
        
         $token = $user->createToken('auth_token')->plainTextToken;
         $user->remember_token = $token;
         $user->save();

         Auth::login($user);

         return [
            'success' => true,
            'user' => $user,
            'token' => $token,
         ];
      } catch (\Exception $e) {
         Log::error("Auth service login Error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);
         
         return [
            'success' => false,
            'message' => 'Failed to login, please try again later.'
         ];
      }
   }

   /**
    * Method tries to logout the user and returns boolean value
    *
    * @param Request $request
    * @return bool
   */
   public function logout(Request $request): bool {
      try {
         $user = $request->user();

         if (!$user) {
            return false;
         }

         $user->tokens()->delete();
         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return true;
      } catch (\Exception $e) {
         Log::error("Auth service logout Error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);

         return false;
      }
   }

   /**
    * Method tries to verify the user's email and returns boolean value
    *
    * @param string $email
    * @return bool
   */
   public function verifyEmail(string $email): bool {
      try {
         $user = User::where('email', $email)->first();

         if (!$user) {
            return false;
         }

         $user->update(['email_verified_at' => Carbon::now()]);
         Mail::to($user->email)->send(new Register($user->name));

         return true;
      } catch (\Exception $e) {
         Log::error("CategoryService Store Error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);

         return false;
      }
   }
}