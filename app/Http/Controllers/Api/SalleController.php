<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalleRequest;
use App\Http\Resources\SalleRessource;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     */
    public function index() {
        $salles = Salle::all();
        return SalleRessource::collection($salles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * Display the specified resource.
     *
     * @param  int  $id
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
    public function destroy($id) {
        try {
            $salle = Salle::findOrFail($id);
            $salle->destroy();
            return response()->json(['status' => true, 'message' => "Salle delete successfully!",]);
        } catch (\Exception $e) {
            return response()->json(['message' => "Salle not found!"], 404);
        }
    }
}
