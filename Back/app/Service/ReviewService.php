<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\Log;
use App\Models\ReviewHelpfulness;
use Illuminate\Http\Response;

class ReviewService {
   /**
    * Method tries to store the review data into the 'reviews' table
    *
    * @param array $data
    * @param $model 
    * @return array
   */
   public function store(array $data, $model): array {
      try {
         $userId = Auth::id(); 
         
         if (!$userId) {
            return [
               'success' => false, 
               'error' => 'Unauthorized.',
               'status' => Response::HTTP_UNAUTHORIZED,
            ];
         }

         $review = $model->reviews()->save(Review::make([
            'user_id' => $userId,
            ...$data
         ]));

         $modelItem = $model::where('id', $data['id'])->first();
         $averageRating = $modelItem->averageRating;
         

         return [
            'success' => true,
            'review' => $review,
            'average_rating' => $averageRating
         ];
      } catch (\Exception $e) {
         Log::error('Failed to update the review: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => $e->getMessage(),
            'status' => 500,
         ];
      }
   }

   /**
    * Method tries to mark the review as helpful or not heplful
    *
    * @param Review $review
    * @param bool $isHelpful
    * @return array
   */
   public function markHelpfulness(Review $review, bool $isHelpful): array {
      try {
         $userId = Auth::id();
         if (!$userId) {
            return [
               'success' => false, 
               'error' => 'Unauthorized.',
               'status' => Response::HTTP_UNAUTHORIZED,
            ];
         }

         $existingVote = ReviewHelpfulness::where('user_id', $userId)
                                          ->where('review_id', $review->id)
                                          ->first();
         if ($existingVote) {
            return [
               'success' => false,
               'error' => 'You have already voted for this review.',
               'status' => Response::HTTP_BAD_REQUEST
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
            'error' => 'Failed to mark, please try again.',
            'status' => 500,
         ];
      }
   }
}