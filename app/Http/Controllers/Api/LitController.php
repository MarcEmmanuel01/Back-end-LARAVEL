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
    // Ajout de la nouvelle méthode pour récupérer les informations d'un lit par son ID
    public function recup_info_lit($id)
    {
        $lit = Lit::find($id);
        if ($lit) {
            return response()->json($lit);
        } else {
            return response()->json(['message' => 'Lit existe pas'], 404);
        }
    }

      // Mettre à jour un lit
    public function updatelit(Request $request, $id)
    {
        $lit = Lit::find($id);
        if ($lit) {
            $lit->description_lit = $request->description_lit;
            $lit->id_chambre = $request->id_chambre;

            $lit->save();
            return response()->json(['message' => 'Lit a ete mis a jour avec succes']);
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


