<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomVerifyEmail;
use App\Service\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(StoreRequest $request): JsonResponse {
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

    public function login(IndexRequest $request): JsonResponse {
        $response = $this->authService->login($request->validated());

        if (!$response['success']) {
            return response()->json([
                'success' => false,
                'message' => $response['message']
            ], $response['message'] === 'Incorrect password.' ? 400 : 404);
        }

        return response()->json([
            'success' => true,
            'user' => new UserResource($response['user']),
            'remember_token' => $response['token']
        ], 200);
    }

    public function logout(Request $request): JsonResponse {   
        if (!$this->authService->logout($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 401);
        }
            
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ], 200);
    }

    public function verifyEmail(string $email): JsonResponse|RedirectResponse {
        if (!$this->authService->verifyEmail($email)) {
            return response()->json(['message' => 'Invalid verification link.'], 400);
        }
       
        $this->logout(request());
        return redirect()->away('http://localhost:5173/login');
    }

    public function sendNewVerificationMessage(Request $request): JsonResponse {
        Mail::to($request['email'])->send(new CustomVerifyEmail($request['name'], $request['email']));

        return response()->json([
            'message' => 'Message sent, check your email and re-login after the verification', 
            'success' => true
        ], 200);
    }
}
