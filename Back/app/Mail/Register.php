<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Register extends Mailable
{
    use Queueable, SerializesModels;
    public string $name;

    /**
     * Create a new message instance.
     *
     * The constructor accepts the recipient's name and stores it in the `$name` property
     * for use in personalizing the email content.
     *
     * @param string $name The name of the recipient to personalize the email.
    */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * This method defines the email content by returning the markdown view for the registration email.
     * The view file is assumed to be located at 'emails.register'.
     *
     * @return Mailable The email instance with the defined content.
    */
    public function build(): Mailable {
        return $this->markdown('emails.register');
    }
}
