<?php

namespace App\Jobs;

use App\Mail\ExportClientMail;
use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportClientListByMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $admin;
    public string $format;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($admin, $format) {
        $this->admin = $admin;
        $this->format = $format;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $filename = "";
        if ($this->format == "pdf") {
            // Création d'un fichier XLS de la liste des personnes
            $filename = "listeClients.pdf";
            $pdf = PDF::loadView('clients.liste', ['clients' => Client::all()]);
            $pdf->save($filename, 'public');
        } else {
            Log::warning("format de fichier non pris en charge");
            return;
        }

        // Transmission d'un mail contenant le fichier calculé

        Mail::to($this->admin->email)->send(new ExportClientMail("Liste des clients au format ".$this->format, $filename));
    }
}
