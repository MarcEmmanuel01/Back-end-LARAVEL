<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier_patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_pat',
        'prenom_pat',
        'date_de_naiss_pat',
        'lieu_de_naiss_pat',
        'localisation',
        'tel_pat',
        'email_pat',
        'profession_pat',
        'antecedents',
    ];

}
