<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Review\StoreRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use App\Service\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
   protected ReviewService $reviewService;

   public function __construct(ReviewService $reviewService) {
      $this->reviewService = $reviewService;
   }

   /**
     * Stores a new review.
     *
     * Validates the request, processes the review through the ReviewService,
     * and returns the created review along with the updated average rating.
     *
     * @param StoreRequest $request The validated request containing review data.
     * @return JsonResponse A JSON response with the newly created review and average rating.
   */
   public function store(StoreRequest $request): JsonResponse {
      $data = $request->validated();
      $response = $this->reviewService->store($data);

      if (!$response['success']) {
         return response()->json([
            'success' => false,
            'message' => $response['error']
         ], $response['status']);
      }

      return response()->json([
         'review' => new ReviewResource($response['review']),
         'average_rating' => $response['average_rating'],
         'message' => 'Review successfully added!',
         'success' => true,
      ], Response::HTTP_OK);
   }

   /**
     * Marks a review as helpful or not.
     *
     * Validates user input, updates the helpfulness status of the review,
     * and returns an updated review resource.
     *
     * @param Request $request The request containing 'isHelpful' boolean.
     * @param Review $review The review being marked as helpful.
     * @return JsonResponse A JSON response indicating the status of the operation.
   */
   public function markHelpfulness(Request $request, Review $review): JsonResponse {
      $request->validate([
         'isHelpful' => 'required|boolean',
      ]);
      $response = $this->reviewService->markHelpfulness($review, $request['isHelpful']);

      if (!$response['success']) {
         return response()->json([
            'success' => false,
            'message' => $response['error']
         ], $response['status']);
      }
  
      return response()->json([
         'message' => 'Thank you for your feedback', 
         'success' => true,
         'review' => new ReviewResource($review),
      ], Response::HTTP_OK);
   }

   /**
     * Reports a review.
     *
     * Marks the review as reported and saves the change.
     *
     * @param Review $review The review to be reported.
     * @return JsonResponse A JSON response confirming the report submission.
   */
   public function report(Review $review): JsonResponse {
      $review->reported = true;
      $review->save();
  
      return response()->json([
         'message' => 'Thank you for the report.', 
         'success' => true,
         'review' => new ReviewResource($review),
      ], Response::HTTP_OK);
   }

   /**
     * Deletes a review.
     *
     * Checks if the user has permission to delete the review. If authorized,
     * the review is removed from the database.
     *
     * @param Review $review The review to be deleted.
     * @return JsonResponse A JSON response confirming the deletion.
   */
   public function destroy(Review $review): JsonResponse {
      // Permissions check
      if (Gate::denies('delete', $review)) {
         return response()->json([
            'success' => false, 
            'error' => 'You can delete only your review.',
         ], Response::HTTP_UNAUTHORIZED);
      }

      $review->delete();

      return response()->json([
         'message' => 'You deleted your review.',
         'success' => true,
      ], Response::HTTP_OK);
   }
}