<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationAccouchement;
use App\Models\Accouchement;
use Illuminate\Http\Request;

class AccouchementController extends Controller
{
    public function informationaccouchement(InformationAccouchement $request)
    {
       $accouchement = new Accouchement ();

       $accouchement -> date_accou = $request->date_accou;
       $accouchement -> description_accou = $request -> description_accou;
       $accouchement -> id_technicien = $request->id_technicien;
       $accouchement -> id_consultation = $request->id_consultation;

       $accouchement -> save ();
      }
}

