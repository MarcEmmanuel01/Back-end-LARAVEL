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

   // Mettre à jour un patient
   public function updatepatient(Request $request, $id)
   {
       $dossier_patient = Dossier_patient::find($id);

       if (!$dossier_patient) {
           return response()->json(['message' => 'Patient non trouvé'], 404);
       }

       $dossier_patient->nom_pat = $request->nom_pat;
       $dossier_patient->prenom_pat = $request->prenom_pat;
       $dossier_patient->date_de_naiss_pat = $request->date_de_naiss_pat;
       $dossier_patient->lieu_de_naiss_pat = $request->lieu_de_naiss_pat;
       $dossier_patient->localisation = $request->localisation;
       $dossier_patient->tel_pat = $request->tel_pat;
       $dossier_patient->email_pat = $request->email_pat;
       $dossier_patient->profession_pat = $request->profession_pat;
       $dossier_patient->antecedents = $request->antecedents;

       $dossier_patient->save();

       return response()->json(['message' => 'Patient mis à jour avec succès'], 200);
   }

   // Supprimer un patient
   public function deletepatient($id)
   {
       $dossier_patient = Dossier_patient::find($id);

       if (!$dossier_patient) {
           return response()->json(['message' => 'Patient non trouvé'], 404);
       }

       $dossier_patient->delete();

       return response()->json(['message' => 'Patient supprimé avec succès'], 200);
   }
}

