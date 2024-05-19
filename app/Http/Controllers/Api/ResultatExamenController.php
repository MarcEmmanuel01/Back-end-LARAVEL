<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationResultatExamen;
use App\Models\Resultat_examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultatExamenController extends Controller
{
    public function informationresultatexamen(InformationResultatExamen $request)
    {
       $resultatexamen = new Resultat_examen();

       $resultatexamen -> objet = $request->objet;
       $resultatexamen -> interpretation = $request -> interpretation;
       $resultatexamen -> date_examen = $request -> date_examen;
       $resultatexamen -> id_consultation = $request->id_consultation;
       $resultatexamen -> id_examen_complet = $request->id_examen_complet;

       $resultatexamen -> save ();
      }

      public function recup_info_resultatexamen($id)
      {
          $resultatexamen = Resultat_examen::find($id);
          if ($resultatexamen) {
              $resultatDetails = DB::table('resultat_examens')
                  ->join('consultations', 'resultat_examens.id_consultation', '=', 'consultations.id')
                  ->join('examens_complets', 'resultat_examens.id_examen_complet', '=', 'examens_complets.id')
                  ->where('resultat_examens.id', $id)
                  ->select('resultat_examens.*', 'consultations.*', 'examens_complets.*')
                  ->first();

              return response()->json($resultatDetails);
          } else {
              return response()->json(['message' => 'Resultat examen not found'], 404);
          }
      }

      public function updateresultatexamen(Request $request, $id)
      {
          $resultatexamen = Resultat_examen::find($id);
          if ($resultatexamen) {
              $resultatexamen->objet = $request->objet;
              $resultatexamen->interpretation = $request->interpretation;
              $resultatexamen->date_examen = $request->date_examen;
              $resultatexamen->id_consultation = $request->id_consultation;
              $resultatexamen->id_examen_complet = $request->id_examen_complet;

              $resultatexamen->save();
              return response()->json(['message' => 'Resultat examen updated successfully']);
          } else {
              return response()->json(['message' => 'Resultat examen not found'], 404);
          }
      }

      public function deleteresultatexamen($id)
      {
          $resultatexamen = Resultat_examen::find($id);
          if ($resultatexamen) {
              $resultatexamen->delete();
              return response()->json(['message' => 'Resultat examen deleted successfully']);
          } else {
              return response()->json(['message' => 'Resultat examen not found'], 404);
          }
      }
  }


