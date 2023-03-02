<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Client::factory([
            'nom' => "nomClientUn",
            'prenom' => "prenomClientUn",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 1,
        ]);
        Client::factory([
            'nom' => "nomClientDeux",
            'prenom' => "prenomClientDeux",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 2,
        ]);
        Client::factory([
            'nom' => "nomClientTrois",
            'prenom' => "prenomClientTrois",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 3,
        ]);
        Client::factory([
            'nom' => "nomClientQuatre",
            'prenom' => "prenomClientQuatre",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 4,
        ]);
        Client::factory([
            'nom' => "nomClientCinq",
            'prenom' => "prenomClientCinq",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 5,
        ]);
        Client::factory(40)->create();
    }
}
