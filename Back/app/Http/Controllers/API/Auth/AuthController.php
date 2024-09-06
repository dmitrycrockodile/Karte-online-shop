<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    protected function register(StoreRequest $request) {
        $data = $request->validated();
        
        $user = User::firstOrCreate([
            'email' => $data['email']
        ], [
            ...$data,
            'password' => Hash::make($data['password'])
        ]);
   
        $token = $user->createToken('auth_token')->plainTextToken;

        Auth::login($user);

        return response()->json([
            'success' => true,
            'user' => $user,
            'remember_token' => $token,
        ], Response::HTTP_CREATED);
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
            $token = $user->createToken('auth_token')->plainTextToken;

            $user->remember_token = $token;
            $user->save();

            Auth::login($user);

            return response()->json([
                'success' => true,
                'email' => $user['email'],
                'remember_token' => $token,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password.',
            ], 401);
        }
    }

    protected function logout(Request $request) {    
        $request->user()->tokens()->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ], Response::HTTP_NO_CONTENT);
    }   
}
