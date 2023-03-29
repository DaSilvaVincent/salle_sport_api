<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientRessource;
use App\Jobs\ExportClientListByMessage;
use App\Models\Client;
use Barryvdh\DomPDF\PDF;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use OpenApi\Annotations as OA;


class OpenApi{}

class ClientController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clients",
     *     @OA\Response(
     *         response="200",
     *         description="Obtenir toutes les données de la BD"
     *     )
     * )
     */
    public function index(Request $request) {
        if (strtolower($request->query('format')) === "pdf"){
            ExportClientListByMessage::dispatch(Auth::user(), strtolower($request->query('format')));
            return Response()->noContent();
        }
        $clients = Client::all();
        return ClientRessource::collection($clients);

    }

    /**
     * @OA\Put(
     *     path="/api/clients/id",
     *     @OA\Response(
     *         response="200",
     *         description="Met a jour le client définie par l'id"
     *     )
     * )
     */
    public function update(Request $request, $id) {
        $client = Client::findOrFail($id);
        if (! Gate::allows('update-client', $client)) {
            return response()->json([
                'status' => false,
                'message' => "Unauthorized",
            ], 403);
        }
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->code_postal = $request->code_postal;
        $client->ville = $request->ville;
        $client->save();
        return response()->json([
            'status' => true,
            'message' => "Client Updated successfully!",
            'client' => $client
        ], 200);
    }

    /**
     * @OA\Del(
     *     path="/api/clients/id",
     *     @OA\Response(
     *         response="200",
     *         description="Supprime le client définie par l'id"
     *     )
     * )
     */
    public function destroy($id) {
        $client = Client::findOrFail($id);
        $client->valide = false;
        return response()->json([
            'status' => true,
            'message' => "Client Destroyed successfully!",
        ], 200);

    }
}
