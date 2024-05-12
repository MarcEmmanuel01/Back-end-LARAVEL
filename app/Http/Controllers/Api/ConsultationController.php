<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnregistrerConsultation;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function enregistrerconsultation(EnregistrerConsultation $request)
    {
       $consultation = new Consultation ();

       $consultation -> date_cons = $request->date_cons;
       $consultation -> constantes = $request -> constantes;
       $consultation -> diagnostiques = $request -> diagnostiques;
       $consultation -> pathologie = $request -> pathologie;
       $consultation -> prescription = $request -> prescription;
       $consultation -> date_rdv = $request -> date_rdv;
       $consultation -> id_dossier_patient = $request->id_dossier_patient;
       $consultation -> id_medecin = $request->id_medecin;

       $consultation -> save ();
      }
}

