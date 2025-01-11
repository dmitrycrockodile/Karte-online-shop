<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\API\User\IndexRequest;
use App\Http\Requests\API\User\EmailUpdateRequest;
use App\Http\Requests\API\User\PasswordUpdateRequest;
use App\Http\Requests\API\User\DeleteAccountRequest;
use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function updateGeneral(IndexRequest $request, User $user) {
      $data = $request->validated();
      $data['sex'] = User::getSexValue($data['sex']);

      $user->update($data);

      return response()->json([
         'new_user' => new UserResource($user),
         'message' => 'Your data was successfully updated',
         'success' => true,
      ], 200);
   }

   public function updateEmail(EmailUpdateRequest $request, User $user) {
      $data = $request->validated();

      if (Hash::check($data['password'], $user->password)) {
         $user->email = $data['email'];
         $user->save();

         return response()->json([
            'new_email' => $user->email,
            'message' => 'Email successfully changed!',
            'success' => true,
         ], 200);
      } else {
         return response()->json([
            'message' => 'Invalid password',
            'success' => false,
         ], 409);
      }
   }

   public function updatePassword(PasswordUpdateRequest $request, User $user) {
      $data = $request->validated();

      if (Hash::check($data['password'], $user->password)) {
         $user->password = Hash::make($data['new_password']);
         $user->save();

         return response()->json([
            'message' => 'Password successfully changed!',
            'success' => true,
         ], 200);
      } else {
         return response()->json([
            'message' => 'Invalid password',
            'success' => false,
         ], 409);
      }
   }

   public function subscribe(Request $request) {
      $validated = $request->validate([
         'email' => 'required|email|unique:subscribers,email',
      ]);

      if (User::where('email', $validated['email'])->first()) {
         $user = User::where('email', $validated['email'])->first();
         $user->update(['is_subscribed' => true]);

         return response()->json([
            'message' => 'Thank you for the subscription!',
            'success' => true,
            'is_subscribed' => true,
         ], 200);
      }

      if (!Subscriber::where('email', $validated['email'])->exists()) {
         Subscriber::create(['email' => $validated['email']]);
         return response()->json([
               'message' => 'Thank you for the subscription!',
               'success' => true,
               'is_subscribed' => true,
         ], 200);
      }

      return response()->json([
         'message' => 'Email already subscribed.',
         'success' => false,
      ], 409);
   }


   // public function updateSubscription(User $user) {
   //    if ($user->is_subscribed) {
   //       $user->is_subscribed = false;
   //       $user->save();

   //       return response()->json([
   //          'message' => 'You have unsubscribed from out newsletter.',
   //          'success' => true,
   //          'is_subscribed' => false,
   //       ], 200);
   //    } else {
   //       $user->is_subscribed = true;
   //       $user->save();
   
   //       return response()->json([
   //          'message' => 'Thank you for the subscription!',
   //          'success' => true,
   //          'is_subscribed' => true,
   //       ], 200);
   //    }
   // }

   public function destroy(DeleteAccountRequest $request, User $user) {
      $data = $request->validated();
   
      if (Hash::check($data['password'], $user->password)) {
         $user->delete();
   
         return response()->json([
            'message' => 'Your account was deleted!',
            'success' => true,
         ], 200);
      } else {
         return response()->json([
            'message' => 'Invalid password.',
            'success' => false,
         ], 409);
      }
   }
}