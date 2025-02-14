<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
   use Queueable, SerializesModels;

   public string $name;
   public string $month;

   /**
    * Create a new message instance.
    *
    * This constructor accepts the recipient's name and the month for the newsletter,
    * which will be used to personalize the email content.
    *
    * @param string $name The name of the recipient.
    * @param string $month The month for the newsletter.
   */
   public function __construct($name, $month)
   {
      $this->name = $name;
      $this->month = $month;
   }

   /**
    * Build the message.
    *
    * This method defines the email content by returning the markdown view for the newsletter.
    * The view file is assumed to be located at 'emails.newsletter'.
    *
    * @return Mailable The email instance with the defined content.
   */
   public function build(): Mailable {
      return $this->markdown('emails.newsletter');
   }
}
