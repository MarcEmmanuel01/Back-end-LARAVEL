<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationTechnicien;
use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function informationtechnicien(InformationTechnicien $request)
    {
       $technicien = new Technicien ();

       $technicien -> grade_tech = $request -> grade_tech;
       $technicien -> specialite_tech = $request -> specialite_tech;
       $technicien -> nom_tech = $request -> nom_tech;
       $technicien -> prenom_tech= $request -> prenom_tech;
       $technicien -> tel_tech= $request -> tel_tech;
       $technicien -> email_tech= $request -> email_tech;
       $technicien -> cni_tech= $request -> cni_tech;
       $technicien -> compte_banquaire_tech = $request -> compte_banquaire_tech;
       $technicien -> save ();
      }

        // Mettre à jour un technicien
        public function updatetechnicien(Request $request, $id)
        {
            $technicien = Technicien::find($id);
            if ($technicien) {
                // Mettre à jour conditionnellement chaque champ
                $fieldsToUpdate = [
                    'grade_tech',
                    'specialite_tech',
                    'nom_tech',
                    'prenom_tech',
                    'tel_tech',
                    'email_tech',
                    'cni_tech',
                    'compte_banquaire_tech'
                ];
                foreach ($fieldsToUpdate as $field) {
                    if ($request->has($field)) {
                        $technicien->$field = $request->$field;
                    }
                }

                $technicien->save();
                return response()->json(['message' => 'Technicien a été mis à jour avec succès']);
            } else {
                return response()->json(['message' => 'Technicien existe pas'], 404);
            }
        }

      // Supprimer un technicien
      public function deletetechnicien($id)
      {
          $technicien = Technicien::find($id);
          if ($technicien) {
              $technicien->delete();
              return response()->json(['message' => 'Technicien a ete mis a jour avec succes']);
          } else {
              return response()->json(['message' => 'Technicien existe pas'], 404);
          }
      }

      // Méthode pour récupérer les informations d'un technicien ou de tous les techniciens
    public function recup_info_technicien($id = null)
    {
        if ($id) {
            $technicien = Technicien::find($id);
            if ($technicien) {
                return response()->json($technicien);
            } else {
                return response()->json(['message' => 'Technicien n\'existe pas'], 404);
            }
        } else {
            $techniciens = Technicien::all();
            return response()->json($techniciens);
        }
    }
}
