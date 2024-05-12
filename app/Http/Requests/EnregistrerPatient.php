<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EnregistrerPatient extends FormRequest
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
            'nom_pat'=>'required',
            'prenom_pat'=>'required',
            'date_de_naiss_pat'=> 'required',
            'lieu_de_naiss_pat'=> 'required',
            'localisation'=> 'required',
            'tel_pat' => 'required|unique:dossier_patients,tel_pat',
            'email_pat'=> 'required|unique:dossier_patients,email_pat',
            'profession_pat'=> 'required',
            'antecedents'=> '',
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
            'nom_pat.required'=> 'Un nom doit etre fourni',
            'prenom_pat.required'=> 'Un prenom doit etre fourni',
            'date_de_naiss_pat.required'=> 'Une date de naissance doit etre fourni',
            'lieu_de_naiss_pat.required'=> 'Un lieu de naissance doit etre fourni',
            'localisation.required'=> 'Une localisation doit etre fourni',
            'tel_pat.required'=> 'Un numero de telephone doit etre fourni',
            'email_pat.required'=> 'Une adresse mail doit etre fourni',
            'email_pat.unique'=> 'Cette adresse mail existe deja',
            'profession_pat.required'=> 'Une profession doit etre fourni',



        ];
    }

}
