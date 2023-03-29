<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        if ($this->routeIs('register')) {
            return [
                'nom' => 'required|string|between:5,50',
                'prenom' => 'required|string|between:5,50',
                'adresse' => 'required|string|max:255',
                'code_postal' => 'required|string|max:10',
                'ville' => 'required|string|max:10',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ];
        }else {
            return [
                'nom' => 'required|string|between:5,50',
                'prenom' => 'required|string|between:5,50',
                'adresse' => 'required|string|max:255',
                'code_postal' => 'required|string|max:10',
                'ville' => 'required|string|max:10',
            ];
        }
    }

}
