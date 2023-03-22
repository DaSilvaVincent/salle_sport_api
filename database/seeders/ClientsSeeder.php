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
        Client::factory()->create([
            'nom' => "nomClientUn",
            'prenom' => "prenomClientUn",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 1,
        ]);
        Client::factory()->create([
            'nom' => "nomClientDeux",
            'prenom' => "prenomClientDeux",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 2,
        ]);
        Client::factory()->create([
            'nom' => "nomClientTrois",
            'prenom' => "prenomClientTrois",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 3,
        ]);
        Client::factory()->create([
            'nom' => "nomClientQuatre",
            'prenom' => "prenomClientQuatre",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 4,
        ]);
        Client::factory()->create([
            'nom' => "nomClientCinq",
            'prenom' => "prenomClientCinq",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 5,
        ]);
        Client::factory()->create([
            'nom' => "nomClientSix",
            'prenom' => "prenomClientSix",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 6,
        ]);
        Client::factory()->create([
            'nom' => "nomClientSept",
            'prenom' => "prenomClientSept",
            'adresse' => "sonAdresse",
            'code_postal' => "sonCodePostal",
            'ville' => "saVille",
            'validite' => true,
            'id_user' => 7,
        ]);
        Client::factory(40)->create();
    }
}
