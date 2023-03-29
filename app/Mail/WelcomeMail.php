<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class WelcomeMail extends Mailable {
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user) {
        $this->user = $user;
        Log::info("Welcome Mail to ".$this->user->name);
    }

    public function envelope() {
        return new Envelope(
            from: new Address('Admin@activite-sport.com', 'Gerard Martin'),
            subject: 'Welcome Mail',
        );
    }

    public function content() {
        return new Content(
            view: 'emails.welcome',
        );
    }

}
