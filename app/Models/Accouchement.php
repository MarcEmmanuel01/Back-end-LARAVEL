<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accouchement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_accou',
        'description',
        'id_technicien',
        'id_consultation',
    ];

}
