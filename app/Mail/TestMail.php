<?php

namespace App\Mail;

// use ...

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

    public $details;
    public $filename;

    public function __construct($details, $filename) {
        Log::info("Prepare message");
        $this->details = $details;
        $this->filename = $filename;
    }

    public function envelope() {
        return new Envelope(
            from: new Address('Admin@appli.com', 'Gerard Martin'),
            subject: 'Liste des personnes', );
    }

    public function content() {
        return new Content(
            view: 'clients.test',
        );
    }

    public function attachments() {
        return [
            Attachment::fromStorageDisk('public', $this->filename),
        ];
    }
}
