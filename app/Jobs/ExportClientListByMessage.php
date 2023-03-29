<?php

namespace App\Jobs;

use App\Mail\ExportClientMail;
use App\Models\Client;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ExportClientListByMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $format;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($format) {
        $this->format = $format;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        if ($this->format == "pdf") {
            // Création d'un fichier PDF de la liste des clients
            $filename = "listeClients.pdf";
            $pdf = PDF::loadView('clients.liste', ['clients' => Client::all()]);
            $pdf->save($filename, 'public');
        }
        Mail::to($this->admin->email)->send(new ExportClientMail("Liste des clients au format".$this->format,$filename));
    }
}
