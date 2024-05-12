<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationHospitalisation extends FormRequest
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
            'date_debut'=>'required',
            'date_fin'=>'required',
            'id_lit' => 'required|exists:lits,id', // Vérifie que id_lit existe dans la table lits
            'id_consultation' => 'required|exists:consultations,id', // Vérifie que id_consultation existe dans la table consultation
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
            'date_debut.required' => 'la date du debut doit etre fourni',
            'date_fin.required'=> 'La date de fin doit etre fourni',
            'id_lit.required' => 'L\'identifiant du lit est requis',
            'id_lit.exists' => 'Le lit sélectionnée n\'existe pas',
            'id_consultation.required' => 'L\'identifiant de la consultation est requis',
            'id_consultation.exists' => 'La consultation sélectionnée n\'existe pas',

           ];
    }
}
