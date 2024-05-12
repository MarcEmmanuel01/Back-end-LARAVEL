<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnregistrerPatient;
use App\Models\Dossier_patient;
use Illuminate\Http\Request;

class DossierPatientController extends Controller
{
   public function enregistrerpatient(EnregistrerPatient $request)
   {
    $dossier_patient = new Dossier_patient();

    $dossier_patient -> nom_pat = $request -> nom_pat;
    $dossier_patient -> prenom_pat= $request -> prenom_pat;
    $dossier_patient -> date_de_naiss_pat= $request -> date_de_naiss_pat;
    $dossier_patient -> lieu_de_naiss_pat= $request -> lieu_de_naiss_pat;
    $dossier_patient -> localisation= $request -> localisation;
    $dossier_patient -> tel_pat= $request -> tel_pat;
    $dossier_patient -> email_pat= $request -> email_pat;
    $dossier_patient -> profession_pat= $request -> profession_pat;
    $dossier_patient -> antecedents = $request -> antecedents;

    $dossier_patient -> save();





   }
}

