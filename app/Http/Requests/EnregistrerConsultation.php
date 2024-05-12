<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EnregistrerConsultation extends FormRequest
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
            'date_cons'=>'required',
            'constantes'=>'required',
            'diagnostiques'=>'required',
            'pathologie'=>'required',
            'prescription'=>'required',
            'date_rdv'=>'required',
            'id_dossier_patient' => 'required|exists:dossier_patients,id', // Vérifie que id_dossier_patient existe dans la table chambres
            'id_medecin' => 'required|exists:medecins,id', // Vérifie que id_medecin existe dans la table chambres
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
            'date_cons.required' => 'la date doit etre fourni',
            'constantes.required'=> 'Les constantes doivent etre fourni',
            'diagnostiques.required'=> 'Le diagnostiaque du medecin doit etre fourni',
            'pathologie.required'=> 'Les pathologies doivent etre fourni',
            'prescription.required'=> 'Les prescriptions doivent etre fourni',
            'date_rdv.required'=> 'La date du rdv doit etre fourni',
            'id_dossier_patient.required' => 'L\'identifiant du dossier du patient est requis',
            'id_dossier_patient.exists' => 'Le dossier du patient sélectionnée n\'existe pas',
            'id_medecin.required' => 'L\'identifiant du medecin est requis',
            'id_medecin.exists' => 'Le medecin sélectionnée n\'existe pas',

           ];
    }
}
