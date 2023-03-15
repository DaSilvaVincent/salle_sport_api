<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use Illuminate\Http\Request;

//Importation des classes pour le mail
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    // Le formulaire du message
    public function formMessageGoogle () {
        return view("forms.message-google");
    }

    // Envoi du mail aux utilisateurs
    public function sendMessageGoogle (Request $request) {

        #1. Validation de la requête
        $this->validate($request, [ 'message' => 'bail|required' ]);

        #2. Récupération des utilisateurs
        $users = User::all();

        #3. Envoi du mail
        Mail::to($users)->bcc("wilo.ahadi@gmail.com")
            ->queue(new Message($request->all()));

        return back()->withText("Message envoyé");
    }

}
