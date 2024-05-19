<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationAccouchement;
use App\Models\Accouchement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccouchementController extends Controller
{
    public function informationaccouchement(InformationAccouchement $request)
    {
       $accouchement = new Accouchement ();

       $accouchement -> date_accou = $request->date_accou;
       $accouchement -> description_accou = $request -> description_accou;
       $accouchement -> id_technicien = $request->id_technicien;
       $accouchement -> id_consultation = $request->id_consultation;

       $accouchement -> save ();
      }

      public function recup_info_accou($id)
    {
        $accouchement = Accouchement::find($id);
        if ($accouchement) {
            $accouchementDetails = DB::table('accouchements')
                ->join('techniciens', 'accouchements.id_technicien', '=', 'techniciens.id')
                ->join('consultations', 'accouchements.id_consultation', '=', 'consultations.id')
                ->where('accouchements.id', $id)
                ->select('accouchements.*', 'techniciens.*', 'consultations.*')
                ->first();

            return response()->json($accouchementDetails);
        } else {
            return response()->json(['message' => 'Accouchement existe pas'], 404);
        }
    }


    // Mettre à jour un accouchement
    public function updateaccouchement(Request $request, $id)
    {
        $accouchement = Accouchement::find($id);

        if (!$accouchement) {
            return response()->json(['message' => 'Accouchement existe pas'], 404);
        }

        $accouchement->date_accou = $request->date_accou;
        $accouchement->description_accou = $request->description_accou;
        $accouchement->id_technicien = $request->id_technicien;
        $accouchement->id_consultation = $request->id_consultation;

        $accouchement->save();

        return response()->json(['message' => 'Accouchement a ete mis a jour avec succes'], 200);
    }

    // Supprimer un accouchement
    public function deleteaccouchement($id)
    {
        $accouchement = Accouchement::find($id);

        if (!$accouchement) {
            return response()->json(['message' => 'Accouchement n\'existe pas'], 404);
        }

        $accouchement->delete();

        return response()->json(['message' => 'Accouchement a ete mis a supprimer avec succes '], 200);
    }
}



