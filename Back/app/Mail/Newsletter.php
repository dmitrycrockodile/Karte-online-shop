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
    */
   public function __construct($name, $month)
   {
      $this->name = $name;
      $this->month = $month;
   }

   public function build() {
      return $this->markdown('emails.newsletter');
   }
}
