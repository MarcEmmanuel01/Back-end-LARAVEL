<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationExamenComplet;
use App\Models\Examen_complet;
use Illuminate\Http\Request;

class ExamenCompletController extends Controller
{
    public function informationexamencomplet(InformationExamenComplet $request)
    {
        $examen_complet = new Examen_complet();

        $examen_complet -> libelle_exam = $request -> libelle_exam;
        $examen_complet -> save();

    }

    // Mettre à jour un examen complet
    public function updateexamencomplet(Request $request, $id)
    {
        $examen_complet = Examen_complet::find($id);

        if (!$examen_complet) {
            return response()->json(['message' => 'Examen complet non trouvé'], 404);
        }

        $examen_complet->libelle_exam = $request->input('libelle_exam');
        // Ajouter d'autres champs si nécessaire

        $examen_complet->save();

        return response()->json(['message' => 'Examen complet mis à jour avec succès'], 200);
    }

    // Supprimer un examen complet
    public function deleteexamencomplet($id)
    {
        $examen_complet = Examen_complet::find($id);

        if (!$examen_complet) {
            return response()->json(['message' => 'Examen complet non trouvé'], 404);
        }

        $examen_complet->delete();

        return response()->json(['message' => 'Examen complet supprimé avec succès'], 200);
    }

    // Ajout de la nouvelle méthode pour récupérer les informations d'un examen complet par son ID
    public function recup_info_examencomplet($id)
    {
        $examen_complet = Examen_complet::find($id);
        if ($examen_complet) {
            return response()->json($examen_complet);
        } else {
            return response()->json(['message' => 'Examen complet non trouvé'], 404);
        }
    }

}



