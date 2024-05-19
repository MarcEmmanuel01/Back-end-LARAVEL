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

      public function updatetechnicien(Request $request, $id)
      {
          $technicien = Technicien::find($id);
          if ($technicien) {
              $technicien->grade_tech = $request->grade_tech;
              $technicien->specialite_tech = $request->specialite_tech;
              $technicien->nom_tech = $request->nom_tech;
              $technicien->prenom_tech = $request->prenom_tech;
              $technicien->tel_tech = $request->tel_tech;
              $technicien->email_tech = $request->email_tech;
              $technicien->cni_tech = $request->cni_tech;
              $technicien->compte_banquaire_tech = $request->compte_banquaire_tech;

              $technicien->save();
              return response()->json(['message' => 'Technicien a ete mis a jour avec succes']);
          } else {
              return response()->json(['message' => 'Technicien existe pas'], 404);
          }
      }

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

}

