<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\API\User\IndexRequest;
use App\Http\Requests\API\User\EmailUpdateRequest;
use App\Http\Requests\API\User\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function updateGeneral(IndexRequest $request, User $user) {
      $data = $request->validated();
      $data['sex'] = User::getSexValue($data['sex']);

      $user->update($data);

      return response()->json([
         'user' => new UserResource($user),
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
}