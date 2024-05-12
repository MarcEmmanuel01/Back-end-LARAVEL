<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationResultatExamen;
use App\Models\Resultat_examen;
use Illuminate\Http\Request;

class ResultatExamenController extends Controller
{
    public function informationresultatexamen(InformationResultatExamen $request)
    {
       $resultatexamen = new Resultat_examen();

       $resultatexamen -> objet = $request->objet;
       $resultatexamen -> interpretation = $request -> interpretation;
       $resultatexamen -> date_examen = $request -> date_examen;
       $resultatexamen -> id_consultation = $request->id_consultation;
       $resultatexamen -> id_examen_complet = $request->id_examen_complet;

       $resultatexamen -> save ();
      }
}

