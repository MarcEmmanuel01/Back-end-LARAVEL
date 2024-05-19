<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationHospitalisation;
use App\Models\Hospitalisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalisationController extends Controller
{
    public function informationhospitalisation(InformationHospitalisation $request)
    {
       $hospitalisation = new Hospitalisation ();

       $hospitalisation -> date_debut = $request->date_debut;
       $hospitalisation -> date_fin = $request -> date_fin;
       $hospitalisation -> id_lit = $request->id_lit;
       $hospitalisation -> id_consultation = $request->id_consultation;

       $hospitalisation -> save ();
      }

      public function recup_info_hospitalisation($id)
      {
          $hospitalisation = Hospitalisation::find($id);
          if ($hospitalisation) {
              $hospitalisationDetails = DB::table('hospitalisations')
                  ->join('lits', 'hospitalisations.id_lit', '=', 'lits.id')
                  ->join('consultations', 'hospitalisations.id_consultation', '=', 'consultations.id')
                  ->where('hospitalisations.id', $id)
                  ->select('hospitalisations.*', 'lits.*', 'consultations.*')
                  ->first();

              return response()->json($hospitalisationDetails);
          } else {
              return response()->json(['message' => 'Hospitalisation not found'], 404);
          }
      }

      public function updatehospitalisation(Request $request, $id)
      {
          $hospitalisation = Hospitalisation::find($id);
          if ($hospitalisation) {
              $hospitalisation->date_debut = $request->date_debut;
              $hospitalisation->date_fin = $request->date_fin;
              $hospitalisation->id_lit = $request->id_lit;
              $hospitalisation->id_consultation = $request->id_consultation;

              $hospitalisation->save();
              return response()->json(['message' => 'Hospitalisation updated successfully']);
          } else {
              return response()->json(['message' => 'Hospitalisation not found'], 404);
          }
      }

      public function deletehospitalisation($id)
      {
          $hospitalisation = Hospitalisation::find($id);
          if ($hospitalisation) {
              $hospitalisation->delete();
              return response()->json(['message' => 'Hospitalisation deleted successfully']);
          } else {
              return response()->json(['message' => 'Hospitalisation not found'], 404);
          }
      }


}


