<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestoredReview extends Mailable
{
   use Queueable, SerializesModels;

   public string $name;
   public string $review;

   /**
    * Create a new message instance.
    */
   public function __construct($name, $review)
   {
      $this->name = $name;
      $this->review = $review;
   }

   public function build() {
      return $this->markdown('emails.restoredReview');
   }
}
