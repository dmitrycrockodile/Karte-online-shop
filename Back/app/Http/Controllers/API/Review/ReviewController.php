<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Review\StoreRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Product;
use App\Models\ReviewHelpfulness;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   public function store(StoreRequest $request) {
      $data = $request->validated();
      $user_id = Auth::id(); 

      $review = Review::create([
         'user_id' => $user_id,
         ...$data,
      ]);

      $product = Product::where('id', $data['product_id'])->first();

      return response()->json([
         'review' => new ReviewResource($review),
         'average_rating' => $product->averageRating,
         'message' => 'Review successfully added!',
         'success' => true,
      ], 200);
   }

   public function markHelpfulness(Request $request, Review $review) {
      $request->validate([
         'isHelpful' => 'required|boolean',
      ]);
      
      $user_id = auth()->id();

      $existingVote = ReviewHelpfulness::where('user_id', $user_id)
                                        ->where('review_id', $review->id)
                                        ->first();
  
      if ($existingVote) {
         return response()->json([
            'message' => 'You have already voted on this review',
            'success' => false,
         ], 400);
      }
  
      ReviewHelpfulness::create([
         'user_id' => $user_id,
         'review_id' => $review->id,
         'is_helpful' => $request['isHelpful'],
      ]);

      $review->update();
  
      return response()->json([
         'message' => 'Thank you for your feedback', 
         'success' => true,
         'review' => new ReviewResource($review),
      ], 200);
   }

   public function report(Review $review) {
      $review->reported = true;
      $review->save();
  
      return response()->json([
         'message' => 'Thank you for the report.', 
         'success' => true,
         'review' => new ReviewResource($review),
      ], 200);
   }

   public function destroy(Review $review) {
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