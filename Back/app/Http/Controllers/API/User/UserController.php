<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\API\User\IndexRequest;
use App\Models\User;

class UserController extends Controller
{
   public function updateGeneral(IndexRequest $request, User $user) {
      $data = $request->validated();
      $data['sex'] = User::getSexValue($data['sex']);

      $user->update($data);

      return response()->json([
         'success' => true,
         'user' => new UserResource($user),
      ], 200);
   }
}