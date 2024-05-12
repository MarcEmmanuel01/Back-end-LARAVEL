<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_tech',
        'specialite_tech',
        'nom_tech',
        'prenom_tech',
        'tel_tech',
        'email_tech',
        'cni_tech',
        'compte_banquaire_tech',
    ];
}
