<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Review\StoreRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use App\Service\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   protected ReviewService $reviewService;

   public function __construct(ReviewService $reviewService) {
      $this->reviewService = $reviewService;
   }

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
      ], 200);
   }

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
      ], 200);
   }

   public function report(Review $review): JsonResponse {
      $review->reported = true;
      $review->save();
  
      return response()->json([
         'message' => 'Thank you for the report.', 
         'success' => true,
         'review' => new ReviewResource($review),
      ], 200);
   }

   public function destroy(Review $review): JsonResponse {
      if ($review->user_id !== Auth::id()) {
         return response()->json(['error' => 'You can delete only your review.', 401]);
      }

      $review->delete();

      return response()->json([
         'message' => 'You deleted your review.',
         'success' => true,
      ], 200);
   }
}