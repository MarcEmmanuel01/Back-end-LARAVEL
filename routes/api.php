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

// Mettre à jour un patient
Route::put('/mettreajourpatient/{id}', [DossierPatientController::class, 'updatepatient']);

// Supprimer un patient
Route::delete('/supprimerpatient/{id}', [DossierPatientController::class, 'deletepatient']);

// Récupérer les informations d'un patient
Route::get('/recuperationpatient/{id}', [DossierPatientController::class, 'recup_info_patient']);




//Information sur un administrateur
Route::post('/informationadmin', [UserController::class,'informationuser']);

// Mettre à jour un administrateur
Route::put('/mettreajouradmin/{id}', [UserController::class, 'updateuser']);

// Supprimer un administrateur
Route::delete('/supprimeradmin/{id}', [UserController::class, 'deleteuser']);

// Récupérer les informations d'un patient
Route::get('/recuperationadmin/{id}', [UserController::class, 'recup_info_user']);




//Information sur les examens complet
Route::post('/informationexamencomplet', [ExamenCompletController::class,'informationexamencomplet']);

// Mettre à jour un examen complet
Route::put('/mettreajourexamencomplet/{id}', [ExamenCompletController::class, 'updateexamencomplet']);

// Supprimer un examen complet
Route::delete('/supprimerexamencomplet/{id}', [ExamenCompletController::class, 'deleteexamencomplet']);

// Récupérer les informations des examens complets
Route::get('/recuperationexamencomplet/{id}', [ExamenCompletController::class, 'recup_info_examencomplet']);




//Information sur les chambres
Route::post('/informationchambre', [ChambreController::class,'informationchambre']);

// Mettre à jour une chambre
Route::put('/mettreajourchambre/{id}', [ChambreController::class, 'updatechambre']);

// Supprimer une chambre
Route::delete('/supprimerchambre/{id}', [ChambreController::class, 'deletechambre']);

// Récupérer les informations des chambres
Route::get('/recuperationchambre/{id}', [ChambreController::class, 'recup_info_chambre']);




//Information sur les lits
Route::post('/informationlit', [LitController::class,'informationlit']);

//Recuperation sur les informations des lits
Route::get('/recuperationlit/{id}', [LitController::class, 'recup_info_lit']);

// Mettre à jour un lit
Route::put('/mettreajourlit/{id}', [LitController::class, 'updatelit']);

// Supprimer un lit
Route::delete('/supprimerlit/{id}', [LitController::class, 'deletelit']);





//Information sur les medecins
Route::post('/informationmedecin', [MedecinController::class,'informationmedecin']);

// Mettre à jour un médecin
Route::put('/mettreajourmedecin/{id}', [MedecinController::class, 'updatemedecin']);

// Supprimer un médecin
Route::delete('/supprimermedecin/{id}', [MedecinController::class, 'deletemedecin']);

// Récupérer les informations d'un medecin
Route::get('/recuperationmedecin/{id}', [MedecinController::class, 'recup_info_medecin']);




//Information sur les techniciens
Route::post('/informationtechnicien', [TechnicienController::class,'informationtechnicien']);

// Mettre à jour un technicien
Route::put('/mettreajourtechnicien/{id}', [TechnicienController::class, 'updatetechnicien']);

// Supprimer un technicien
Route::delete('/supprimertechnicien/{id}', [TechnicienController::class, 'deletetechnicien']);

// Récupérer les informations d'un technicien
Route::get('/recuperationtechnicien/{id}', [TechnicienController::class, 'recup_info_technicien']);




//Enregistrer une nouvelle consultation
Route::post('/enregistrerconsultation', [ConsultationController::class,'enregistrerconsultation']);

// Récupérer les informations des consultations
Route::get('/recuperationconsultation/{id}', [ConsultationController::class, 'recup_info_consultation']);

// Mettre à jour une consultation
Route::put('/mettreajourconsultation/{id}', [ConsultationController::class, 'updateconsultation']);

// Supprimer une consultation
Route::delete('/supprimerconsultation/{id}', [ConsultationController::class, 'deleteconsultation']);





//Information sur les accouchements
Route::post('/informationaccouchement', [AccouchementController::class,'informationaccouchement']);

// Mettre à jour un accouchement
Route::put('/mettreajouraccouchement/{id}', [AccouchementController::class, 'updateaccouchement']);

// Supprimer un accouchement
Route::delete('/supprimeraccouchement/{id}', [AccouchementController::class, 'deleteaccouchement']);

//Recupperation sur les informations sur l'accouchement
Route::get('/recuperationaccouchement/{id}', [AccouchementController::class,'recup_info_accou']);




//Information sur les traitements
Route::post('/informationtraitement', [TraitementController::class,'informationtraitement']);

// recuperation d'un traitement
Route::get('/recuperationtraitement/{id}', [TraitementController::class, 'recup_info_traitement']);

// Mettre à jour un traitement
Route::put('/mettreajourtraitement/{id}', [TraitementController::class, 'updatetraitement']);

// Supprimer un traitement
Route::delete('/supprimertraitement/{id}', [TraitementController::class, 'deletetraitement']);




//Information sur les hospitalisations
Route::post('/informationhospitalisation', [HospitalisationController::class,'informationhospitalisation']);

// recuperation d'une hospitalisation
Route::get('/recuperationhospitalisation/{id}', [HospitalisationController::class, 'recup_info_hospitalisation']);

// Mettre à jour une hospitalisation
Route::put('/mettreajourhospitalisation/{id}', [HospitalisationController::class, 'updatehospitalisation']);

// Supprimer une hospitalisation
Route::delete('/supprimerhospitalisation/{id}', [HospitalisationController::class, 'deletehospitalisation']);





//Information sur les resultats des examens
Route::post('/informationresultatexamen', [ResultatExamenController::class,'informationresultatexamen']);

// recuperation de resultat des examens
Route::get('/recuperationresultatexamen/{id}', [ResultatExamenController::class, 'recup_info_resultatexamen']);

// Mettre à jour un résultat d'examen
Route::put('/mettreajourresultatexamen/{id}', [ResultatExamenController::class, 'updateresultatexamen']);

// Supprimer un résultat d'examen
Route::delete('/supprimerresultatexamen/{id}', [ResultatExamenController::class, 'deleteresultatexamen']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
