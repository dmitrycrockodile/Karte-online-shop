<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    protected function register(StoreRequest $request) {
        $data = $request->validated();

        $remember_token = Str::random(60);
        
        $user = User::firstOrCreate([
            'email' => $data['email']
        ], [
            ...$data,
            'password' => Hash::make($data['password']),
            'remember_token' => $remember_token,
        ]);
        
        event(new Registered($user));
        Auth::login($user);

        return response()->json([
            'success' => true,
            'email' => $data['email'],
            'remember_token' => $remember_token,
        ]);
    }

    protected function login(IndexRequest $request) {
        $data = $request->validated();

        $user = User::whereEmail($data['email'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        if (Hash::check($data['password'], $user->password)) {
            $remember_token = Str::random(60);

            $user->remember_token = $remember_token;
            $user->save();

            Auth::login($user);

            return response()->json([
                'success' => true,
                'email' => $user['email'],
                'remember_token' => $remember_token,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password.',
            ], 401);
        }
    }
}
