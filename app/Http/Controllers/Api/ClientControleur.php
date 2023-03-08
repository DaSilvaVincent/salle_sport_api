<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientRessource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientControleur extends Controller
{
    public function index() {
        $clients = Client::all();
        return ClientRessource::collection($clients);
    }

    public function store(ClientRequest $request)
    {
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->code_postal = $request->code_postal;
        $client->ville = $request->ville;
        $client->save();
        return response()->json(['status' => true, 'message' => "Client created successfully!", 'client' => $client], 200);
    }

    public function update(Request $request, $id) {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return response()->json(['status' => true, 'message' => "Client updated successfully!", 'client' => $client], 200);
    }

    public function destroy($id) {
        try {
            $client = Client::findOrFail($id);
            $client->validite = false;
            return response()->json(['status' => true, 'message' => "Client delete successfully!",]);
        } catch (\Exception $e) {
            return response()->json(['message' => "Client not found!"], 404);
        }
    }
}
