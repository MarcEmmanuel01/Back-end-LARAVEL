<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat_examen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consultation',
        'id_examen_complet',
        'objet',
        'interpretation',
        'date_examen',
    ];
}
