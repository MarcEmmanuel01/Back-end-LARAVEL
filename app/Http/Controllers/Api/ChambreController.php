<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationChambre;
use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
  public function informationchambre(InformationChambre $request)
  {
     $chambre = new Chambre ();

     $chambre -> description_chambre = $request -> description_chambre;
     $chambre -> save ();
    }

    // Mettre à jour une chambre
    public function updatechambre(Request $request, $id)
    {
        $chambre = Chambre::find($id);

        if (!$chambre) {
            return response()->json(['message' => 'Chambre non trouvée'], 404);
        }

        $chambre->description_chambre = $request->input('description_chambre');
        // Ajouter d'autres champs si nécessaire

        $chambre->save();

        return response()->json(['message' => 'Chambre mise à jour avec succès'], 200);
    }

    // Supprimer une chambre
    public function deletechambre($id)
    {
        $chambre = Chambre::find($id);

        if (!$chambre) {
            return response()->json(['message' => 'Chambre non trouvée'], 404);
        }

        $chambre->delete();

        return response()->json(['message' => 'Chambre supprimée avec succès'], 200);
    }
}

