<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationLit;
use App\Models\Lit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LitController extends Controller
{
  public function informationlit(InformationLit $request)
  {
     $lit = new Lit ();

     $lit -> description_lit = $request -> description_lit;
     $lit -> id_chambre = $request->id_chambre;
     $lit -> save ();
    }

    public function recup_info_lit()
    {


        $lits = DB::table('lits')
                    ->join('chambres', 'lits.id', '=', 'chambres.id')
                    ->select('lits.*', 'chambres.*')
                    ->get();
        return $lits;
      }

}
