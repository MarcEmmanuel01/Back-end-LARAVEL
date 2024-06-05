<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationLit;
use App\Models\Lit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LitController extends Controller
{
  public function informationlit(InformationLit $request)
  {
     $lit = new Lit ();

     $lit -> description_lit = $request -> description_lit;
     $lit -> id_chambre = $request->id_chambre;
     $lit -> save ();
    }
    // Méthode pour récupérer les informations d'un lit ou de tous les lits
    public function recup_info_lit($id = null)
    {
        if ($id) {
            $lit = Lit::find($id);
            if ($lit) {
                return response()->json($lit);
            } else {
                return response()->json(['message' => 'Lit n\'existe pas'], 404);
            }
        } else {
            $lits = Lit::all();
            return response()->json($lits);
        }
    }

      // Mettre à jour un lit
      public function updatelit(Request $request, $id)
      {
          $lit = Lit::find($id);
          if ($lit) {
              // Mettre à jour conditionnellement chaque champ
              if ($request->has('description_lit')) {
                  $lit->description_lit = $request->description_lit;
              }
              if ($request->has('id_chambre')) {
                  $lit->id_chambre = $request->id_chambre;
              }

              $lit->save();
              return response()->json(['message' => 'Lit a été mis à jour avec succès']);
          } else {
              return response()->json(['message' => 'Lit existe pas'], 404);
          }
      }

    // Supprimer un lit
    public function deletelit($id)
    {
        $lit = Lit::find($id);
        if ($lit) {
            $lit->delete();
            return response()->json(['message' => 'Lit a ete supprimer avec succes']);
        } else {
            return response()->json(['message' => 'Lit existe pas'], 404);
        }
    }

}


