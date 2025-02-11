<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use App\Models\ReviewHelpfulness;

class ReviewService {
   /**
    * Method tries to store the review data into the 'reviews' table
    *
    * @param array $data
    * @return array
   */
   public function store(array $data) {
      try {
         $userId = Auth::id(); 
         if (!$userId) {
            return [
               'success' => false, 
               'error' => 'Unauthorized.',
               'status' => 401,
            ];
         }

         $review = Review::create([
            'user_id' => $userId,
            ...$data,
         ]);
         $product = Product::where('id', $data['product_id'])->first();

         return [
            'success' => true,
            'review' => $review,
            'average_rating' => $product->averageRating
         ];
      } catch (\Exception $e) {
         Log::error('Failed to update the review: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => 'Failed to create the review, please try again.',
            'status' => 500,
         ];
      }
   }

   /**
    * Method tries to mark the review as helpful or not heplful
    *
    * @param array $data
    * @return array
   */
   public function markHelpfulness(Review $review, bool $isHelpful) {
      try {
         $userId = Auth::id();
         if (!$userId) {
            return [
               'success' => false, 
               'error' => 'Unauthorized.',
               'status' => 401,
            ];
         }

         $existingVote = ReviewHelpfulness::where('user_id', $userId)
                                          ->where('review_id', $review->id)
                                          ->first();
         if ($existingVote) {
            return [
               'success' => false,
               'error' => 'You have already voted for this review.',
               'status' => 400
            ];
         }
   
         ReviewHelpfulness::create([
            'user_id' => $userId,
            'review_id' => $review->id,
            'is_helpful' => $isHelpful,
         ]);

         $review->update();

         return [
            'success' => true
         ];
      } catch (\Exception $e) {
         Log::error('Failed to update the review: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => 'Failed to update cart item, please try again.',
            'status' => 500,
         ];
      }
   }
}