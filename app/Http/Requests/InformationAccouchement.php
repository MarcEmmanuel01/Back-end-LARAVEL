<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationAccouchement extends FormRequest
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
            'date_accou'=>'required',
            'description_accou'=>'required',
            'id_technicien' => 'required|exists:techniciens,id', // Vérifie que id_technicien existe dans la table chambres
            'id_consultation' => 'required|exists:consultations,id', // Vérifie que id_consultation existe dans la table chambres
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
            'date_accou.required' => 'la date doit etre fourni',
            'description_accou.required'=> 'Les description doivent etre fourni',
            'id_technicien.required' => 'L\'identifiant du technicien est requis',
            'id_technicien.exists' => 'Le technicien sélectionnée n\'existe pas',
            'id_consultation.required' => 'L\'identifiant de la consultation est requis',
            'id_consultation.exists' => 'La consultation sélectionnée n\'existe pas',

           ];
    }
}
