<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationChambre;
use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
  public function informationchambre(InformationChambre $request)
  {
     $chambre = new Chambre ();

     $chambre -> description_chambre = $request -> description_chambre;
     $chambre -> save ();
    }
}
