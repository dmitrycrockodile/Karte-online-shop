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
     */
    public function __construct($name, $email)
    {
        $this->name = $name; 
        $this->email = $email; 
    }

    public function build() {
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
