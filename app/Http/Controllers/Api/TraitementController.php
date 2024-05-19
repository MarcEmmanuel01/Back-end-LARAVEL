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

      public function recup_info_traitement($id)
      {
          $traitement = Traitement::find($id);
          if ($traitement) {
              $traitementDetails = DB::table('traitements')
                  ->join('consultations', 'traitements.id_consultation', '=', 'consultations.id')
                  ->where('traitements.id', $id)
                  ->select('traitements.*', 'consultations.*')
                  ->first();

              return response()->json($traitementDetails);
          } else {
              return response()->json(['message' => 'Traitement not found'], 404);
          }
      }

      public function updatetraitement(Request $request, $id)
      {
          $traitement = Traitement::find($id);
          if ($traitement) {
              $traitement->objet_maladie = $request->objet_maladie;
              $traitement->observation_maladie = $request->observation_maladie;
              $traitement->id_consultation = $request->id_consultation;

              $traitement->save();
              return response()->json(['message' => 'Traitement a ete mis a jour avec succes']);
          } else {
              return response()->json(['message' => 'Traitement existe pas'], 404);
          }
      }

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

