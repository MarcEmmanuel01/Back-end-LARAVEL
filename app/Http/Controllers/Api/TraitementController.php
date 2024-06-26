<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationTraitement;
use App\Models\Traitement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      // Méthode pour récupérer les informations d'un traitement ou de tous les traitements
      public function recup_info_traitement($id = null)
      {
          if ($id) {
              $traitement = Traitement::find($id);
              if ($traitement) {
                  $traitementDetails = DB::table('traitements')
                      ->join('consultations', 'traitements.id_consultation', '=', 'consultations.id')
                      ->where('traitements.id', $id)
                      // Utilisez un alias pour l'ID de traitement
                      ->select('traitements.id as traitement_id', 'traitements.*', 'consultations.*')
                      ->first();

                  return response()->json($traitementDetails);
              } else {
                  return response()->json(['message' => 'Traitement non trouvé'], 404);
              }
          } else {
              $traitements = DB::table('traitements')
                  ->join('consultations', 'traitements.id_consultation', '=', 'consultations.id')
                  // Utilisez un alias pour l'ID de traitement
                  ->select('traitements.id as traitement_id', 'traitements.*', 'consultations.*')
                  ->get();

              return response()->json($traitements);
          }
      }

        // Mettre à jour un traitement
        public function updatetraitement(Request $request, $id)
        {
            $traitement = Traitement::find($id);
            if ($traitement) {
                // Mettre à jour conditionnellement chaque champ
                $fieldsToUpdate = [
                    'objet_maladie',
                    'observation_maladie',
                    'id_consultation'
                ];
                foreach ($fieldsToUpdate as $field) {
                    if ($request->has($field)) {
                        $traitement->$field = $request->$field;
                    }
                }

                $traitement->save();
                return response()->json(['message' => 'Traitement a été mis à jour avec succès']);
            } else {
                return response()->json(['message' => 'Traitement existe pas'], 404);
            }
        }


      // Supprimer un traitement
      public function deletetraitement($id)
      {
          $traitement = Traitement::find($id);
          if ($traitement) {
              $traitement->delete();
              return response()->json(['message' => 'Traitement a ete supprime avec succes']);
          } else {
              return response()->json(['message' => 'Traitement existe pas'], 404);
          }
      }


}

