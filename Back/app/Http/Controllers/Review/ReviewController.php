<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResolvedReview;
use App\Mail\RestoredReview;

class ReviewController extends Controller
{
   public function index() {
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

   public function show(Review $review) {
      return view('review.show', compact('review'));
   }

   public function resolve_report(Review $review) {
      if ($review->reported == true) {
         $review->reported = false;
         $content = $review->body ? $review->body : $review->title;
         Mail::to($review->user->email)->send(new ResolvedReview($review->user->name, $content));
      } 
      $review->save();
      
      return redirect()->route('review.index');
   }

   public function delete(Review $review) {
      $review->deleted = true;
      $review->save();

      if ($review->reported == true) {
         $content = $review->body ? $review->body : $review->title;
         Mail::to($review->user->email)->send(new ResolvedReview($review->user->name, $content));
      } 

      return redirect()->route('review.index');
   }

   public function restore(Review $review) {
      $review->deleted = false;
      $review->save();

      $content = $review->body ? $review->body : $review->title;
      Mail::to($review->user->email)->send(new RestoredReview($review->user->name, $content));

      return redirect()->route('review.index');
   }
}
