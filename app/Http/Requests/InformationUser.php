<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InformationUser extends FormRequest
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
            'name_user'=>'required',
            'email_user'=> 'required|unique:users,email_user',
            'password_user'=> 'required',
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
            'name_user.required'=> 'Un nom doit etre fourni',
            'email_user.required'=> 'Une adresse mail doit etre fourni',
            'email_user.unique'=> 'Cette adresse mail existe deja',
            'password_user.required'=> 'Un mot de passe doit etre fourni',

           ];
    }
}
