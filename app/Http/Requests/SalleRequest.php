<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return ['nom' => "required|string|between:5,50",
            'adresse' => "required|string|between:5,50",
            'code_postal' => "required|string|between:1,5",
            'ville' => "required|string|between:5,50"];
    }
}
