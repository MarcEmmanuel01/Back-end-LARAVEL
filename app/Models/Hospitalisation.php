<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lit',
        'id_consultation',
        'date_debut',
        'date_fin',
    ];
}
