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
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;
use App\Mail\CustomVerifyEmail;
use App\Service\AuthService;
use Carbon\Carbon;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(StoreRequest $request) {
        if (!$this->authService->register($request->validated())) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to register, please try again!',
            ], 400);
        }
        
        return response()->json([
            'success' => true,
            'verified' => false,
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
            ], 400);
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
                'success' => false,
                'message' => 'Unauthorized.',
            ], 401);
        }
    }

    public function verifyEmail($email) {
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->email_verified_at = Carbon::now();
            $user->save();

            Mail::to($user->email)->send(new Register($user->name));

            return redirect()->away('http://localhost:5173/account');
        }

        return response()->json(['message' => 'Invalid verification link.'], 400);
    }

    public function sendNewVerificationMessage(Request $request) {
        Mail::to($request['email'])->send(new CustomVerifyEmail($request['name'], $request['email']));

        return response()->json([
            'message' => 'Message sent, check your email and re-login after the verification', 
            'success' => true
        ], 200);
    }
}
