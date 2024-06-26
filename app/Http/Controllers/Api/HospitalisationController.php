<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationHospitalisation;
use App\Models\Hospitalisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      // Récupérer les informations de toutes les hospitalisations ou d'une hospitalisation spécifique par ID
      public function recup_info_hospitalisation($id = null)
      {
          if ($id) {
              $hospitalisation = Hospitalisation::find($id);
              if ($hospitalisation) {
                  $hospitalisationDetails = DB::table('hospitalisations')
                      ->join('lits', 'hospitalisations.id_lit', '=', 'lits.id')
                      ->join('consultations', 'hospitalisations.id_consultation', '=', 'consultations.id')
                      ->where('hospitalisations.id', $id)
                      // Utilisez un alias pour l'ID de l'hospitalisation
                      ->select('hospitalisations.id as hospitalisation_id', 'hospitalisations.*', 'lits.*', 'consultations.*')
                      ->first();

                  return response()->json($hospitalisationDetails);
              } else {
                  return response()->json(['message' => 'Hospitalisation non trouvée'], 404);
              }
          } else {
              $hospitalisations = DB::table('hospitalisations')
                  ->join('lits', 'hospitalisations.id_lit', '=', 'lits.id')
                  ->join('consultations', 'hospitalisations.id_consultation', '=', 'consultations.id')
                  // Utilisez un alias pour l'ID de l'hospitalisation
                  ->select('hospitalisations.id as hospitalisation_id', 'hospitalisations.*', 'lits.*', 'consultations.*')
                  ->get();

              return response()->json($hospitalisations);
          }
      }



        // Mettre à jour une hospitalisation
        public function updatehospitalisation(Request $request, $id)
        {
            $hospitalisation = Hospitalisation::find($id);
            if ($hospitalisation) {
                // Mettre à jour conditionnellement chaque champ
                $fieldsToUpdate = [
                    'date_debut',
                    'date_fin',
                    'id_lit',
                    'id_consultation'
                ];
                foreach ($fieldsToUpdate as $field) {
                    if ($request->has($field)) {
                        $hospitalisation->$field = $request->$field;
                    }
                }

                $hospitalisation->save();
                return response()->json(['message' => 'Hospitalisation a été mise à jour avec succès']);
            } else {
                return response()->json(['message' => 'Hospitalisation existe pas'], 404);
            }
        }

     // Supprimer une hospitalisation
      public function deletehospitalisation($id)
      {
          $hospitalisation = Hospitalisation::find($id);
          if ($hospitalisation) {
              $hospitalisation->delete();
              return response()->json(['message' => 'Hospitalisation a ete supprimer avec succes']);
          } else {
              return response()->json(['message' => 'Hospitalisation existe pas'], 404);
          }
      }


}


