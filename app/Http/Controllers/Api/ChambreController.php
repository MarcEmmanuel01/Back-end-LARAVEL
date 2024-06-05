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

        // Mettre à jour conditionnellement chaque champ
        $fieldsToUpdate = [
            'description_chambre',
            // Ajoutez d'autres noms de champs ici si nécessaire
        ];
        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field)) {
                $chambre->$field = $request->input($field);
            }
        }

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

    // Méthode pour récupérer les informations d'une chambre ou de toutes les chambres
    public function recup_info_chambre($id = null)
    {
        if ($id) {
            $chambre = Chambre::find($id);
            if ($chambre) {
                return response()->json($chambre);
            } else {
                return response()->json(['message' => 'Chambre non trouvée'], 404);
            }
        } else {
            $chambres = Chambre::all();
            return response()->json($chambres);
        }
    }

}

