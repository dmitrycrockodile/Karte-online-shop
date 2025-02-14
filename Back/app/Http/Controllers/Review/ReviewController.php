<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResolvedReview;
use App\Mail\RestoredReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReviewController extends Controller
{
   /**
    * Displays the list of reviews with custom sorting.
    *
    * This method fetches all reviews from the database, orders them based on their deletion and report status, 
    * and sorts by creation date. It then returns a view with the reviews.
    *
    * @return View The view with the reviews.
   */
   public function index(): View {
      $reviews = Review::orderByRaw("
         CASE 
            WHEN deleted = true THEN 2
            WHEN deleted = false AND reported = false THEN 1
            ELSE 0
         END ASC
      ")
      ->orderBy('created_at', 'DESC')
      ->get();

      return view('review.index', compact('reviews'));
   }

   /**
    * Displays a single review.
    *
    * This method fetches a specific review by its ID and returns a view with the review details.
    *
    * @param Review $review The review to be displayed.
    * @return View The view with the review details.
   */
   public function show(Review $review): View {
      return view('review.show', compact('review'));
   }

   /**
    * Resolves the reported status of a review.
    *
    * This method checks if the review is reported, marks it as resolved (sets `reported` to false),
    * and sends a resolution email to the review's user.
    *
    * @param Review $review The review to be resolved.
    * @return RedirectResponse Redirects back to the reviews index page.
   */
   public function resolveReport(Review $review): RedirectResponse {
      if ($review->reported == true) {
         $review->reported = false;

         $this->sendReviewResolvedEmail($review);
      } 
      $review->save();
      
      return redirect()->route('review.index');
   }

   /**
    * Marks a review as deleted.
    *
    * This method sets the `deleted` status of the review to true, 
    * and sends an email to the user if the review was reported.
    *
    * @param Review $review The review to be deleted.
    * @return RedirectResponse Redirects back to the reviews index page.
   */
   public function delete(Review $review): RedirectResponse {
      $review->deleted = true;
      $review->save();

      if ($review->reported == true) {
         $content = $review->body ? $review->body : $review->title;
         Mail::to($review->user->email)->send(new ResolvedReview($review->user->name, $content));
      } 

      return redirect()->route('review.index');
   }

   /**
    * Restores a deleted review.
    *
    * This method sets the `deleted` status of the review to false and sends an email
    * informing the user that their review has been restored.
    *
    * @param Review $review The review to be restored.
    * @return RedirectResponse Redirects back to the reviews index page.
   */
   public function restore(Review $review): RedirectResponse {
      $review->deleted = false;
      $review->save();

      $this->sendReviewRestoredEmail($review);

      return redirect()->route('review.index');
   }

   /**
    * Sends a resolution email to the user when their review is marked as resolved.
    *
    * @param Review $review The resolved review.
   */
   private function sendReviewResolvedEmail(Review $review): void {
      $content = $review->body ? $review->body : $review->title;
      Mail::to($review->user->email)->send(new ResolvedReview($review->user->name, $content));
   }

   /**
    * Sends a restoration email to the user when their review is restored.
    *
    * @param Review $review The restored review.
   */
   private function sendReviewRestoredEmail(Review $review): void {
      $content = $review->body ? $review->body : $review->title;
      Mail::to($review->user->email)->send(new RestoredReview($review->user->name, $content));
   }
}
