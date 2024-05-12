<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationHospitalisation;
use App\Models\Hospitalisation;
use Illuminate\Http\Request;

class HospitalisationController extends Controller
{
    public function informationhospitalisation(InformationHospitalisation $request)
    {
       $hospitalisation = new Hospitalisation ();

       $hospitalisation -> date_debut = $request->date_debut;
       $hospitalisation -> date_fin = $request -> date_fin;
       $hospitalisation -> id_lit = $request->id_lit;
       $hospitalisation -> id_consultation = $request->id_consultation;

       $hospitalisation -> save ();
      }
}

