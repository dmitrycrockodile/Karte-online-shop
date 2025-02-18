<?php

namespace App\Http\Controllers\API\User;

use App\Enums\UserSubscriptionStatus;
use App\Http\Controllers\API\BaseApiController;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\API\User\IndexRequest;
use App\Http\Requests\API\User\EmailUpdateRequest;
use App\Http\Requests\API\User\PasswordUpdateRequest;
use App\Http\Requests\API\User\DeleteAccountRequest;
use App\Http\Requests\API\User\SubscribeRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseApiController
{
   protected UserService $userService;

   public function __construct(UserService $userService) {
      $this->userService = $userService;
   }

   /**
     * Updates general user data (like name, sex, etc.).
     *
     * Validates and updates user information (excluding email and password).
     *
     * @param IndexRequest $request The validated user data.
     * @param User $user The user to be updated.
     * @return JsonResponse The response with updated user data.
   */  
   public function updateGeneral(IndexRequest $request, User $user): JsonResponse {
      $data = $request->validated();
      $data['sex'] = User::getSexValue($data['sex']);

      $user->update($data);

      return $this->successResponse(
         [ 'new_user' => new UserResource($user) ],
         'Your data was successfully updated'
      );
   }

   /**
     * Updates the user's email.
     *
     * Validates the user's password and updates the email address.
     * Returns a response indicating the result of the operation.
     *
     * @param EmailUpdateRequest $request The request containing the new email and password.
     * @param User $user The user whose email is to be updated.
     * @return JsonResponse The response indicating the success or failure of the operation.
     */
   public function updateEmail(EmailUpdateRequest $request, User $user): JsonResponse {
      $data = $request->validated();

      if (Hash::check($data['password'], $user->password)) {
         $user->email = $data['email'];
         $user->save();

         return $this->successResponse(
            [ 'new_email' => $user->email ],
            'Email successfully changed!'
         );
      } else {
         return $this->errorResponse('Invalid password', Response::HTTP_CONFLICT);
      }
   }

   /**
     * Updates the user's password.
     *
     * Validates the provided current password and updates the password.
     * Returns a response indicating success or failure.
     *
     * @param PasswordUpdateRequest $request The request containing the current and new password.
     * @param User $user The user whose password is to be updated.
     * @return JsonResponse The response indicating the success or failure of the operation.
   */
   public function updatePassword(PasswordUpdateRequest $request, User $user): JsonResponse {
      $data = $request->validated();

      if (Hash::check($data['password'], $user->password)) {
         $user->password = Hash::make($data['new_password']);
         $user->save();

         return $this->successResponse([], 'Password successfully changed!');
      } else {
         return $this->errorResponse('Invalid password', Response::HTTP_CONFLICT);
      }
   }

   /**
     * Subscribes the user to a newsletter.
     *
     * Validates the request and handles the user's subscription status.
     * Returns a response indicating the success or failure of the operation.
     *
     * @param SubscribeRequest $request The validated subscription data.
     * @return JsonResponse The response indicating whether the user is subscribed or not.
   */
   public function subscribe(SubscribeRequest $request): JsonResponse {
      $data = $request->validated();
      $response = $this->userService->subscribe($data);

      if (!$response['success']) {
         return $this->errorResponse($response['error'], $response['status']);
      }

      return $this->successResponse(
         [ 'is_subscribed' => true ],
         'Thank you for the subscription!'
      );
   }

   /**
     * Unsubscribes the user from the newsletter.
     *
     * If the user is subscribed, it updates the subscription status to false.
     * Returns a response indicating whether the user was unsubscribed or not.
     *
     * @param User $user The user to be unsubscribed.
     * @return JsonResponse The response indicating the success or failure of the operation.
   */
   public function unsubscribe(User $user): JsonResponse {
      if ($user->is_subscribed->value) {
         $user->update(['is_subscribed' => UserSubscriptionStatus::NOT_SUBSCRIBED]);

         return $this->successResponse(
            [ 'is_subscribed' => false ],
            'You have unsubscribed from out newsletter.'
         );
      } else {
         return $this->errorResponse('You are not subscribed.', Response::HTTP_CONFLICT);
      }
   }
 
   /**
     * Deletes the user's account.
     *
     * Validates the user's password before deleting the account. 
     * Returns a response indicating the result of the operation.
     *
     * @param DeleteAccountRequest $request The request containing the user's password.
     * @param User $user The user whose account is to be deleted.
     * @return JsonResponse The response indicating success or failure of the deletion.
   */
   public function destroy(DeleteAccountRequest $request, User $user): JsonResponse {
      $data = $request->validated();
   
      if (Hash::check($data['password'], $user->password)) {
         $user->delete();
   
         return $this->successResponse([], 'Your account was deleted!');
      } else {
         return $this->errorResponse('Invalid password.', Response::HTTP_CONFLICT);
      }
   }
}