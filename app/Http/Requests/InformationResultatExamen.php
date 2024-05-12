<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationResultatExamen extends FormRequest
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
            'objet'=>'required',
            'interpretation'=>'required',
            'date_examen'=>'required',
            'id_consultation' => 'required|exists:consultations,id', // Vérifie que id_consultation existe dans la table consultation
            'id_examen_complet' => 'required|exists:examen_complets,id', // Vérifie que id_examen_complet existe dans la table examen complet
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
            'objet.required' => 'l\'objet de l\'examen doit etre fourni',
            'interpretation.required'=> 'L\'interpretation de l\'examen doit etre fourni',
            'id_consultation.required' => 'L\'identifiant de la consultation est requis',
            'id_consultation.exists' => 'La consultation sélectionnée n\'existe pas',
            'id_examen_complet.required' => 'L\'identifiant de examen complet est requis',
            'id_examen_complet.exists' => 'L\'examen complet sélectionnée n\'existe pas',

           ];
    }
}
