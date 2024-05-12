<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationExamenComplet;
use App\Models\Examen_complet;
use Illuminate\Http\Request;

class ExamenCompletController extends Controller
{
    public function informationexamencomplet(InformationExamenComplet $request)
    {
        $examen_complet = new Examen_complet();

        $examen_complet -> libelle_exam = $request -> libelle_exam;
        $examen_complet -> save();

    }

}

