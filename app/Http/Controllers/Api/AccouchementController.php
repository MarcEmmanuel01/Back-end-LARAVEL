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

    // Méthode pour récupérer les informations d'un accouchement ou de tous les accouchements
    public function recup_info_accou($id = null)
{
    if ($id) {
        $accouchement = Accouchement::find($id);
        if ($accouchement) {
            $accouchementDetails = DB::table('accouchements')
                ->join('techniciens', 'accouchements.id_technicien', '=', 'techniciens.id')
                ->join('consultations', 'accouchements.id_consultation', '=', 'consultations.id')
                ->where('accouchements.id', $id)
                // Assurez-vous que l'ID de l'accouchement est renvoyé en le renommant si nécessaire
                ->select('accouchements.id as accouchement_id', 'accouchements.*', 'techniciens.*', 'consultations.*')
                ->first();

            return response()->json($accouchementDetails);
        } else {
            return response()->json(['message' => 'Accouchement n\'existe pas'], 404);
        }
    } else {
        $accouchements = DB::table('accouchements')
            ->join('techniciens', 'accouchements.id_technicien', '=', 'techniciens.id')
            ->join('consultations', 'accouchements.id_consultation', '=', 'consultations.id')
            // Assurez-vous que l'ID de l'accouchement est renvoyé en le renommant si nécessaire
            ->select('accouchements.id as accouchement_id', 'accouchements.*', 'techniciens.*', 'consultations.*')
            ->get();

        return response()->json($accouchements);
    }
}



    // Mettre à jour un accouchement
    public function updateaccouchement(Request $request, $id)
{
    $accouchement = Accouchement::find($id);

    if (!$accouchement) {
        return response()->json(['message' => 'Accouchement existe pas'], 404);
    }

    // Mettre à jour conditionnellement chaque champ
    $fieldsToUpdate = [
        'date_accou',
        'description_accou',
        'id_technicien',
        'id_consultation'
    ];
    foreach ($fieldsToUpdate as $field) {
        if ($request->has($field)) {
            $accouchement->$field = $request->$field;
        }
    }

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



