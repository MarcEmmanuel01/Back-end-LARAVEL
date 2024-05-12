<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationTraitement extends FormRequest
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
            'objet_maladie'=>'required',
            'observation_maladie'=>'required',
            'id_consultation' => 'required|exists:consultations,id', // Vérifie que id_consultation existe dans la table cconsultation
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
            'objet_maladie.required' => 'l\'objet de la maladie doit etre fourni',
            'observation_maladie.required'=> 'Une observation de la maladie doit etre fourni',
            'id_consultation.required' => 'L\'identifiant de la consultation est requis',
            'id_consultation.exists' => 'La consultation sélectionnée n\'existe pas',

           ];
    }
}
