<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeMessage implements ShouldQueue {

//    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
//
//    public $users;
//
//    /**
//     * Create a new job instance.
//     *
//     * @return void
//     */
//    public function __construct($users){
//        $this->users = $users;
//    }
//
//    /**
//     * Execute the job.
//     *
//     * @return void
//     */
//    public function handle()
//    {   $this->users => mail
//        return $this->from("bonjour@gmail.com") // L'expéditeur
//        ->subject("Message welcome") // Le sujet
//        ->view('clients.bienvenue'); // La vue
//    }

}
#mhsendmail

