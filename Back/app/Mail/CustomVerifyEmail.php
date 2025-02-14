<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;

class CustomVerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public $email;

    /**
     * Create a new message instance.
     *
     * The constructor takes the user's name and email as parameters.
     * These values are then used to customize the email content.
     *
     * @param string $name The user's name for email personalization.
     * @param string $email The user's email address to generate the verification URL.
    */
    public function __construct($name, $email)
    {
        $this->name = $name; 
        $this->email = $email; 
    }

    /**
     * Build the message.
     *
     * This method constructs the email message, generates a signed URL for email verification,
     * and returns a Markdown email view with the relevant data passed to it.
     *
     * @return Mailable The email message instance.
    */
    public function build(): Mailable {
        $url = URL::temporarySignedRoute(
            'verify.email', 
            now()->addMinutes(10),
            ['email' => $this->email]
        );
    
        return $this->markdown('emails.verification')
                    ->with([
                        'name' => $this->name,
                        'url' => $url
                    ]);
    }
}
