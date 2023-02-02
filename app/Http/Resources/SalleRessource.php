<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalleRessource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return ['id' => $this->id,
            'nom' => $this->nom,
            'adresse' => $this->adresse,
            'code_postal_ville' => sprintf("%s %s",$this->code_postal, $this->ville)];
    }
}
