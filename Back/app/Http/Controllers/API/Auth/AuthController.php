<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\API\Auth\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomVerifyEmail;
use App\Service\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AuthController extends BaseApiController
{
    protected AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    /**
     * Handles user registration.
     * 
     * This method processes a registration request by validating user input 
     * and attempting to register a new account via the authentication service.
     * 
     * @param StoreRequest $request The validated registration request.
     * @return JsonResponse A JSON response indicating success or failure.
    */
    public function register(StoreRequest $request): JsonResponse {
        if (!$this->authService->register($request->validated())) {
            return $this->errorResponse(
                'Failed to register, please try again!',
                Response::HTTP_BAD_REQUEST
            );
        }
        
        return $this->successResponse([ 'verified' => false ], Response::HTTP_OK);
    }

    /**
     * Handles user authorization.
     * 
     * This method processes a authorization request by validating user input 
     * and attempting to login via the authentication service.
     * 
     * @param IndexRequest $request The validated authorization request.
     * @return JsonResponse A JSON response indicating success or failure and token
    */
    public function login(IndexRequest $request): JsonResponse {
        $response = $this->authService->login($request->validated());

        if (!$response['success']) {
            $statusCode = $response['message'] === 'Incorrect password.' ? Response::HTTP_BAD_REQUEST : Response::HTTP_NOT_FOUND;
            return $this->errorResponse($response['message'], $statusCode);
        }

        return $this->successResponse([ 
            'user' => new UserResource($response['user']),
            'remember_token' => $response['token']
        ]);
    }

    /**
     * Handles user unauthorization.
     * 
     * This method processes a unauthorization request by user input 
     * and attempting to logout via the authentication service.
     * 
     * @param Request $request The unauthorization request.
     * @return JsonResponse A JSON response indicating success or failure.
    */
    public function logout(Request $request): JsonResponse {   
        if (!$this->authService->logout($request)) {
            return $this->errorResponse('Unauthorized.', Response::HTTP_UNAUTHORIZED);
        }

        return $this->successResponse([], 'Logged out successfully.');
    }

    /**
     * Handles email verification.
     * 
     * This method gets an email and verifies the newly created account
     * 
     * @param string $email The email to verify.
     * @return JsonResponse|RedirectResponse A JSON response indicating failure or redirect on success.
    */
    public function verifyEmail(string $email): JsonResponse|RedirectResponse {
        if (!$this->authService->verifyEmail($email)) {
            return $this->errorResponse('Invalid verification link.', Response::HTTP_BAD_REQUEST);
        }
       
        $this->logout(request());
        return redirect()->away('http://localhost:5173/login');
    }

    /**
     * Sends the verification message.
     * 
     * This method gets an email and sends the verification message
     * using custom mailer.
     * 
     * @param Request $request The validated verification request.
     * @return JsonResponse A JSON response indicating success or failure.
    */
    public function sendNewVerificationMessage(Request $request): JsonResponse {
        Mail::to($request['email'])->send(new CustomVerifyEmail($request['name'], $request['email']));

        return $this->successResponse([], 'Message sent, check your email and re-login after the verification');
    }
}
