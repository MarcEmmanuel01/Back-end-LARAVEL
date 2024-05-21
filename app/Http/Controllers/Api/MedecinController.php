<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationMedecin;
use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedecinController extends Controller
{
    public function informationmedecin(InformationMedecin $request)
    {
       $medecin = new Medecin ();

       $medecin -> grade_med = $request -> grade_med;
       $medecin -> specialite_med = $request -> specialite_med;
       $medecin -> nom_med = $request -> nom_med;
       $medecin -> prenom_med= $request -> prenom_med;
       $medecin -> tel_med= $request -> tel_med;
       $medecin -> email_med= $request -> email_med;
       $medecin -> cni_med= $request -> cni_med;
       $medecin -> compte_banquaire_med = $request -> compte_banquaire_med;
       $medecin -> save ();
      }

        // Mettre à jour un medecin
      public function updatemedecin(Request $request, $id)
    {
        $medecin = Medecin::find($id);
        if ($medecin) {
            $medecin->grade_med = $request->grade_med;
            $medecin->specialite_med = $request->specialite_med;
            $medecin->nom_med = $request->nom_med;
            $medecin->prenom_med = $request->prenom_med;
            $medecin->tel_med = $request->tel_med;
            $medecin->email_med = $request->email_med;
            $medecin->cni_med = $request->cni_med;
            $medecin->compte_banquaire_med = $request->compte_banquaire_med;

            $medecin->save();
            return response()->json(['message' => 'Medecin a ete mis a jour avec succes']);
        } else {
            return response()->json(['message' => 'Medecin existe pas'], 404);
        }
    }
    // Supprimer un medecin
    public function deletemedecin($id)
    {
        $medecin = Medecin::find($id);
        if ($medecin) {
            $medecin->delete();
            return response()->json(['message' => 'Medecin a ete mis a supprimer avec succes']);
        } else {
            return response()->json(['message' => 'Medecin existe pas'], 404);
        }
    }

    // Ajout de la nouvelle méthode pour récupérer les informations d'un médecin ou de tous les médecins
    public function recup_info_medecin($id = null)
    {
        if ($id) {
            $medecin = Medecin::find($id);
            if ($medecin) {
                return response()->json($medecin);
            } else {
                return response()->json(['message' => 'Médecin n\'existe pas'], 404);
            }
        } else {
            $medecins = Medecin::all();
            return response()->json($medecins);
        }
    }
}

