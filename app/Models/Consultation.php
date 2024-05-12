<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_cons',
        'constantes',
        'diagnostiques',
        'pathologie',
        'prescription',
        'date_rdv',
        'id_dossier_patient',
        'id_medecin',
    ];
}
