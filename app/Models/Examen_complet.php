<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen_complet extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_exam',
    ];
}
