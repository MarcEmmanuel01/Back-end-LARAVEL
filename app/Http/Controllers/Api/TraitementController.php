<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationTraitement;
use App\Models\Traitement;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    public function informationtraitement(InformationTraitement $request)
    {
       $traitement = new Traitement ();

       $traitement -> objet_maladie = $request->objet_maladie;
       $traitement -> observation_maladie = $request -> observation_maladie;
       $traitement -> id_consultation = $request->id_consultation;

       $traitement -> save ();
      }
}

