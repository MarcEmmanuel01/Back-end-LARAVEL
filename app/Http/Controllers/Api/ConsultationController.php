<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnregistrerConsultation;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

      public function recup_info_consultation($id)
      {
          $consultation = Consultation::find($id);
          if ($consultation) {
              $consultationDetails = DB::table('consultations')
                  ->join('dossier_patients', 'consultations.id_dossier_patient', '=', 'dossier_patients.id')
                  ->join('medecins', 'consultations.id_medecin', '=', 'medecins.id')
                  ->where('consultations.id', $id)
                  ->select('consultations.*', 'dossier_patients.*', 'medecins.*')
                  ->first();

              return response()->json($consultationDetails);
          } else {
              return response()->json(['message' => 'Consultation existe pas'], 404);
          }
      }

    // Mettre à jour une consultation
    public function updateconsultation(Request $request, $id)
    {
        $consultation = Consultation::find($id);

        if (!$consultation) {
            return response()->json(['message' => 'Consultation non trouvée'], 404);
        }

        $consultation->date_cons = $request->input('date_cons');
        $consultation->constantes = $request->input('constantes');
        $consultation->diagnostiques = $request->input('diagnostiques');
        $consultation->pathologie = $request->input('pathologie');
        $consultation->prescription = $request->input('prescription');
        $consultation->date_rdv = $request->input('date_rdv');
        $consultation->id_dossier_patient = $request->input('id_dossier_patient');
        $consultation->id_medecin = $request->input('id_medecin');

        $consultation->save();

        return response()->json(['message' => 'Consultation mise à jour avec succès'], 200);
    }

    // Supprimer une consultation
    public function deleteconsultation($id)
    {
        $consultation = Consultation::find($id);

        if (!$consultation) {
            return response()->json(['message' => 'Consultation non trouvée'], 404);
        }

        $consultation->delete();

        return response()->json(['message' => 'Consultation supprimée avec succès'], 200);
    }
}


