<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;

class ReviewPolicy
{
    /**
     * Determine if the user can delete a review.
     * 
     * @param User $user The user performing the action
     * @param Review $review The review user's trying to delete
    */
    public function delete(User $user, Review $review) {
        return $user->id === $review->user_id;
    }
}
