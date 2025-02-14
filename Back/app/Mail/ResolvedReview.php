<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResolvedReview extends Mailable
{
   use Queueable, SerializesModels;

   public string $name;
   public string $review;

   /**
    * Create a new message instance.
    *
    * The constructor accepts the recipient's name and the review content,
    * and stores them in the `$name` and `$review` properties for use in the email.
    *
    * @param string $name The name of the recipient to personalize the email.
    * @param string $review The content of the resolved review to include in the email.
   */
   public function __construct($name, $review)
   {
      $this->name = $name;
      $this->review = $review;
   }

   /**
    * Build the message.
    *
    * This method defines the email content by returning the markdown view for the resolved review email.
    * The view file is assumed to be located at 'emails.resolvedReview'.
    *
    * @return Mailable The email instance with the defined content.
   */
   public function build(): Mailable {
      return $this->markdown('emails.resolvedReview');
   }
}
