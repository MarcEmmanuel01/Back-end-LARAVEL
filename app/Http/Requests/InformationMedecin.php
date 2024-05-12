<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationMedecin extends FormRequest
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
            'grade_med'=>'required',
            'specialite_med'=>'required',
            'nom_med'=>'required',
            'prenom_med'=>'required',
            'tel_med' => 'required|unique:medecins,tel_med',
            'email_med'=> 'required|unique:medecins,email_med',
            'cni_med'=> 'required|unique:medecins,cni_med',
            'compte_banquaire_med'=> 'required|unique:medecins,compte_banquaire_med',
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
            'grade_med.required'=> 'Un grade du medecin doit etre fourni',
            'specialite_med.required'=> 'Une specialite du medecin doit etre fourni',
            'nom_med.required'=> 'Un nom doit etre fourni',
            'prenom_med.required'=> 'Un prenom doit etre fourni',
            'tel_med.required'=> 'Un numero de telephone doit etre fourni',
            'tel_med.unique'=> 'Ce numero de telephone existe deja',
            'email_med.required'=> 'Une adresse mail doit etre fourni',
            'email_med.unique'=> 'Cette adresse mail existe deja',
            'cni_med.required'=> 'Une carte cni doit etre fourni',
            'cni_med.unique'=> 'Cette carte cni existe deja',
            'compte_banquaire_med.required'=> 'Un numero de compte banquaire doit etre fourni',
            'compte_banquaire_med.unique'=> 'Ce numero de compte banquaire existe deja',



           ];
    }
}
