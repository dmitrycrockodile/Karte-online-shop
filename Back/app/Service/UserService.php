<?php

namespace App\Service;

use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class UserService {
   /**
    * Method tries to subscribe the user to the newsletter
    *
    * @param array $data
    * @return array
   */
   public function subscribe(array $data) {
      try {
         if (User::where('email', $data['email'])->first()) {
            $user = User::where('email', $data['email'])->first();
            if ($user->is_subscribed) {
               return [
                  'success' => false,
                  'error' => 'This email already subscribed!',
                  'status' => Response::HTTP_CONFLICT,
               ];
            } else {
               $user->update(['is_subscribed' => true]);
      
               return [ 'success' => true ];
            }
         }
   
         Subscriber::create(['email' => $data['email']]);
         return [ 'success' => true ];
      } catch (\Exception $e) {
         Log::error('Failed to subscribe the user: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => 'Failed to subscribe, please try again.',
            'status' => 500,
         ];
      }
   }
}