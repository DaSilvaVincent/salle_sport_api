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
            'prenom' => "required|string|between:5,50",
            'age' => "numeric|between:18,65"];
    }
}
