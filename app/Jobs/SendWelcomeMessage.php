<?php

namespace App\Jobs;

use App\Mail\TestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMessage implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(){
        Log::info("Send welcome");
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        // Transmission d'un mail contenant le fichier calculé
        Mail::to("robert.duchmol@domain.fr")
        ->send(new TestMail());
    }

}
#mhsendmail

