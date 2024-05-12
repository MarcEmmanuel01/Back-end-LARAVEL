<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationLit extends FormRequest
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
    public function rules(): array
    {
        return [
            'description_lit'=>'required',
            'id_chambre' => 'required|exists:chambres,id', // Vérifie que id_chambre existe dans la table chambres

        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()-> json([
            'succes' => false,
            'satut_code'=> 422,
            'error' => true,
            'message' => 'Erreur de validation',
            'errorsList' => $validator -> errors()
       ]));
    }

    public function messages()
    {

        return [
            'description_lit.required'=> 'Une description du lit doit etre fourni',
            'id_chambre.required' => 'L\'identifiant de la chambre est requis',
            'id_chambre.exists' => 'La chambre sélectionnée n\'existe pas',

           ];
    }
}
