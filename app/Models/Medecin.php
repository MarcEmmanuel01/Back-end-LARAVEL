<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_med',
        'specialite_med',
        'nom_med',
        'prenom_med',
        'tel_med',
        'email_med',
        'cni_med',
        'compte_banquaire_med',
    ];

}
