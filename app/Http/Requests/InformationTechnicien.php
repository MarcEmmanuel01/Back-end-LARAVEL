<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationTechnicien extends FormRequest
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
            'grade_tech'=>'required',
            'specialite_tech'=>'required',
            'nom_tech'=>'required',
            'prenom_tech'=>'required',
            'tel_tech' => 'required|unique:techniciens,tel_tech',
            'email_tech'=> 'required|unique:techniciens,email_tech',
            'cni_tech'=> 'required|unique:techniciens,cni_tech',
            'compte_banquaire_tech'=> 'required|unique:techniciens,compte_banquaire_tech',
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
            'grade_tech.required'=> 'Un grade du technicien doit etre fourni',
            'specialite_tech.required'=> 'Une specialite du technicien doit etre fourni',
            'nom_tech.required'=> 'Un nom doit etre fourni',
            'prenom_tech.required'=> 'Un prenom doit etre fourni',
            'tel_tech.required'=> 'Un numero de telephone doit etre fourni',
            'tel_tech.unique'=> 'Ce numero de telephone existe deja',
            'email_tech.required'=> 'Une adresse mail doit etre fourni',
            'email_tech.unique'=> 'Cette adresse mail existe deja',
            'cni_tech.required'=> 'Une carte cni doit etre fourni',
            'cni_tech.unique'=> 'Cette carte cni existe deja',
            'compte_banquaire_tech.required'=> 'Un numero de compte banquaire doit etre fourni',
            'compte_banquaire_tech.unique'=> 'Ce numero de compte banquaire existe deja',

           ];
    }
}
