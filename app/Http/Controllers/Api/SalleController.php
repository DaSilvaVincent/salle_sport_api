<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalleRequest;
use App\Http\Resources\SalleRessource;
use App\Models\Salle;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="My First API",
 *     version="0.1"
 * )
 */
class OpenApi{}

class SalleController extends Controller {

    /**
     * @OA\Get(
     *     path="/api/salles",
     *     @OA\Response(
     *         response="200",
     *         description="Obtenir toutes les données de la BD"
     *     )
     * )
     */
    public function index(Request $request) {
        $full = $request->get('full', false);
        if ($full)
            $salles = Salle::with('activites')->get();
        else
            $salles = Salle::all();
        return SalleRessource::collection($salles);
    }


    /**
     * @OA\Post(
     *     path="/api/salles",
     *     @OA\Response(
     *         response="200",
     *         description="Ajoute une nouvelle salle dans la BD"
     *     )
     * )
     */
    public function store(SalleRequest $request) {
        // Ici les données ont été validées dans la classe SalleRequest
        $salle = new Salle();
        $salle->nom = $request->nom;
        $salle->adresse = $request->adresse;
        $salle->code_postal = $request->code_postal;
        $salle->ville = $request->ville;
        $salle->save();
        return response()->json(['status' => true, 'message' => "Salle created successfully!", 'salle' => $salle], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/salles/id",
     *     @OA\Response(
     *         response="200",
     *         description="Affiche une salle définie par l'id"
     *     )
     * )
     */
    public function show($id) {
        $salle = Salle::findOrFail($id);
        return new SalleRessource($salle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    /**
     * @OA\Put(
     *     path="/api/salles/id",
     *     @OA\Response(
     *         response="200",
     *         description="Met a jour la salle définie par l'id"
     *     )
     * )
     */
    public function update(Request $request, $id) {
        $salle = Salle::findOrFail($id);
        $salle->update($request->all());
        return response()->json(['status' => true, 'message' => "Salle updated successfully!", 'salle' => $salle], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    /**
     * @OA\Del(
     *     path="/api/salles/id",
     *     @OA\Response(
     *         response="200",
     *         description="Supprime la salle définie par l'id"
     *     )
     * )
     */
    public function destroy($id) {
        try {
            $salle = Salle::findOrFail($id);
            $salle->destroy($id);
            return response()->json(['status' => true, 'message' => "Salle delete successfully!",]);
        } catch (\Exception $e) {
            return response()->json(['message' => "Salle not found!"], 404);
        }
    }
}
