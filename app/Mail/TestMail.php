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

class TestMail extends Mailable {
    use Queueable, SerializesModels;

    public function __construct() {
        Log::info("Prepare message");
    }

    public function envelope() {
        return new Envelope(subject: 'Welcome mail',);
    }

    public function content() {
        return new Content(
            view: 'emails.welcome',
        );
    }

}
