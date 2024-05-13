<?php

use App\Http\Controllers\Api\AccouchementController;
use App\Http\Controllers\Api\ChambreController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DossierPatientController;
use App\Http\Controllers\Api\ExamenCompletController;
use App\Http\Controllers\Api\HospitalisationController;
use App\Http\Controllers\Api\LitController;
use App\Http\Controllers\Api\MedecinController;
use App\Http\Controllers\Api\PersonnelController;
use App\Http\Controllers\Api\ResultatExamenController;
use App\Http\Controllers\Api\TechnicienController;
use App\Http\Controllers\Api\TraitementController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Inscrire un nouveau patient
Route::post('/enregistrerpatient', [DossierPatientController::class,'enregistrerpatient']);


//Information sur l'admin
Route::post('/informationadmin', [UserController::class,'informationuser']);

//Information sur les examens complet
Route::post('/informationexamencomplet', [ExamenCompletController::class,'informationexamencomplet']);

//Information sur les chambres
Route::post('/informationchambre', [ChambreController::class,'informationchambre']);

//Information sur les lits
Route::post('/informationlit', [LitController::class,'informationlit']);

//Information sur les medecins
Route::post('/informationmedecin', [MedecinController::class,'informationmedecin']);

//Information sur les techniciens
Route::post('/informationtechnicien', [TechnicienController::class,'informationtechnicien']);

//Enregistrer une nouveau consultation
Route::post('/enregistrerconsultation', [ConsultationController::class,'enregistrerconsultation']);

//Information sur les accouchements
Route::post('/informationaccouchement', [AccouchementController::class,'informationaccouchement']);

//Information sur les traitements
Route::post('/informationtraitement', [TraitementController::class,'informationtraitement']);

//Information sur les hospitalistions
Route::post('/informationhospitalisation', [HospitalisationController::class,'informationhospitalisation']);

//Information sur les resultats des examens
Route::post('/informationresultatexamen', [ResultatExamenController::class,'informationresultatexamen']);

//Recupperation sur les informations du lit et de la chambre
Route::get('/recuperationlit', [LitController::class,'recup_info_lit']);


//Recupperation sur les informations sur l'accouchement
Route::get('/recuperationaccouchement', [AccouchementController::class,'recup_info_accou']);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
