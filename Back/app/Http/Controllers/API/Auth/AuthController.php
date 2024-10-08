<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;

class AuthController extends Controller
{
    public function register(StoreRequest $request) {
        $data = $request->validated();
        
        User::firstOrCreate([
            'email' => $data['email']
        ], [
            ...$data,
            'password' => Hash::make($data['password'])
        ]);

        Mail::to($data['email'])->send(new Register($data['name']));

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function login(IndexRequest $request) {
        $data = $request->validated();

        $user = User::whereEmail($data['email'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please write correct email address',
            ], 404);
        }
        
        if (Hash::check($data['password'], $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;

            $user->remember_token = $token;
            $user->save();

            Auth::login($user);

            return response()->json([
                'success' => true,
                'user' => new UserResource($user),
                'remember_token' => $token,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password.',
            ], 401);
        }
    }

    public function logout(Request $request) {   
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully.',
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unauthorized',
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
