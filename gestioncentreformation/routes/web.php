<?php


use App\Models\Admin;
use App\Models\Event;
use Livewire\Livewire;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\EtudiantDashController;
use App\Http\Controllers\ProfesseurDashController;
use App\Http\Controllers\GroupeFormationController;
use App\Http\Controllers\FormationMatiereController;
use App\Http\Controllers\EtudiantFormationController;

use App\Http\Controllers\MatiereProfesseurController;
use App\Http\Controllers\EtudiantGroupeFormationController;
use App\Http\Controllers\GroupeFormationProfesseurController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/       

//============================== WebSite / Selection / Login / Logout ==============================//

        Route::get('/selection', function () {
            return view('auth/selection');
        });
        Route::get('/skillup', function () {
            return view('index');
        });

        Route::get('/', function () {
            return view('index');
        });

         Route::get('/', [HomeController::class, 'index'])->name('skillup');

         Route::group(['namespace' => 'Auth'], function () {
            Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
            Route::post('/login', [LoginController::class, 'login'])->name('login');
    
        });


        Route::get('/indexAdmin',[AdminController::class,'index'],function(){
            $admin = Admin::find(Session::get('id'));
            return view(('AdminDash/indexAdmin'),compact('admin'));
        })->middleware('guard:admin');

        Route::get('/indexEtudiant',[EtudiantDashController::class,'index'],function(){
            $etudiant = Etudiant::find(Session::get('id'));
            return view(('EtudiantDash/indexEtudiant'),compact('etudiant'));
        })->middleware('guard:etudiant');

        Route::get('/indexProfesseur',[ProfesseurDashController::class,'index'],function(){
            $professeur = Professeur::find(Session::get('id'));
            return view(('ProfesseurDash/indexProfesseur'),compact('professeur'));
        })->middleware('guard:professeur');

        Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');
        // Route::post('/login/{type}', [LoginController::class, 'login'])->middleware('guest')->name('login.show');

//============================== End Selection / Login /Logout ==============================//


 
    Route::get('AdminDash/indexAdmin', [AdminController::class, 'index'])->name('indexAdmin')->middleware('guard:admin');  
    Route::get('EtudiantDash/indexEtudiant', [EtudiantDashController::class, 'index'])->name('indexEtudiant')->middleware('guard:etudiant');   
    Route::get('AdminDash/indexAdmin', [AdminController::class, 'index'])->name('indexAdmin')->middleware('guard:admin');      

  /*  Route::get('/Etudiantprofile', [EtudiantDashController::class, 'index'], function () {
        return view('EtudiantDash/Etudiantprofile');
    });

    Route::get('/Professeurprofile', [ProfesseurDashController::class, 'index'], function () {
        return view('ProfesseurDash/Profeseurprofile');
    });   */


//============================= Calendar ==================================//

    Livewire::component('calendar', Calendar::class);

    Route::get('/Professeuremploi', [ProfesseurDashController::class, 'emploi'], function () {
        return view('ProfesseurDash/emplois/index');
    })->middleware('guard:professeur');

    Route::get('/Etudiantemploi', [EtudiantDashController::class, 'emploi'], function () {
        return view('EtudiantDash/emplois/index');
    })->middleware('guard:etudiant');
    Route::get('/Emploi', [AdminController::class, 'emploi'], function () {
        return view('AdminDash/emplois/index');
    })->middleware('guard:admin');
    Route::get('/createEmploi', [AdminController::class, 'create'], function () {
        return view('AdminDash/emplois/create');
    })->middleware('guard:admin');
    Route::resource('emploi', AdminController::class)->middleware('guard:admin');  


//============================= End Calendar ==================================//

 

//==================================   DASHBOARD ADMIN ===============================//

    Route::resource('etudiant', EtudiantController::class)->middleware('guard:admin');  
    Route::get('/etudiantShowEtudiant/{id}',[EtudiantController::class,'showEtudiant'] )->middleware('guard:admin');   //Pour voir les détails depaiement de chaque étudiant 
    
    Route::resource('professeur', ProfesseurController::class)->middleware('guard:admin');  

    Route::resource('formation',FormationController::class)->middleware('guard:admin');  

    Route::resource('salle', SalleController::class)->middleware('guard:admin');  

    Route::resource('groupeFormation',GroupeFormationController::class)->middleware('guard:admin');

    Route::resource('paiement',PaiementController::class)->middleware('guard:admin');

    Route::resource('matiere',MatiereController::class)->middleware('guard:admin');

    Route::get('/Adminprofile', [AdminController::class, 'profile'], function () {
        return view('AdminDash/Adminprofile');
    })->middleware('guard:admin');

    /*                           PARTIE ETUDIANT FORMATION                            */

    Route::get('/etudiantFormationIndex/{id}',[EtudiantFormationController::class,'index'] )->middleware('guard:admin');

    Route::get('/etudiantFormationHome',[EtudiantFormationController::class,'home'] )->middleware('guard:admin');

    Route::get('/etudiantFormationCreate/{id}',[EtudiantFormationController::class,'create'] )->middleware('guard:admin');
    Route::post('/etudiantFormationCreate',[EtudiantFormationController::class,'store'] )->middleware('guard:admin');

    Route::get('/etudiantFormationShow/{id}',[EtudiantFormationController::class,'show'] )->middleware('guard:admin');

    Route::get('/etudiantFormationUpdate/{id}',[EtudiantFormationController::class,'edit'] )->middleware('guard:admin');
    Route::post('/etudiantFormationUpdate/{id}',[EtudiantFormationController::class,'update'] )->middleware('guard:admin');

    Route::post('/etudiantFormationDestroy/{id}/{h}',[EtudiantFormationController::class,'destroy'] )->middleware('guard:admin');

    /*                          END PARTIE ETUDIANT FORMATION                            */




    /*                           PARTIE FORMATION MATIERE                           */

    Route::get('/formationMatiereIndex/{id}',[FormationMatiereController::class,'index'] )->middleware('guard:admin');

    Route::get('/formationMatiereHome',[FormationMatiereController::class,'home'] )->middleware('guard:admin');

    Route::get('/formationMatiereCreate/{id}',[FormationMatiereController::class,'create'] )->middleware('guard:admin');
    Route::post('/formationMatiereCreate',[FormationMatiereController::class,'store'] )->middleware('guard:admin');

    Route::get('/formationMatiereShow/{id}',[FormationMatiereController::class,'show'] )->middleware('guard:admin');

    Route::get('/formationMatiereUpdate/{id}',[FormationMatiereController::class,'edit'] )->middleware('guard:admin');
    Route::post('/formationMatiereUpdate/{id}',[FormationMatiereController::class,'update'] )->middleware('guard:admin');  

    Route::post('/formationMatiereDestroy/{id}/{h}',[FormationMatiereController::class,'destroy'] )->middleware('guard:admin');

    /*                          END PARTIE FORMATION MATIERE                          */




    /*                           PARTIE MATIERE PROFESSEUR                        */

    Route::get('/matiereProfesseurIndex/{id}',[MatiereProfesseurController::class,'index'] )->middleware('guard:admin');

    Route::get('/matiereProfesseurHome',[MatiereProfesseurController::class,'home'] )->middleware('guard:admin');

    Route::get('/matiereProfesseurCreate/{id}',[MatiereProfesseurController::class,'create'] )->middleware('guard:admin');
    Route::post('/matiereProfesseurCreate',[MatiereProfesseurController::class,'store'] )->middleware('guard:admin');

    Route::get('/matiereProfesseurShow/{id}',[MatiereProfesseurController::class,'show'] )->middleware('guard:admin');
    
    Route::get('/matiereProfesseurUpdate/{id}',[MatiereProfesseurController::class,'edit'] )->middleware('guard:admin');
    Route::post('/matiereProfesseurUpdate/{id}',[MatiereProfesseurController::class,'update'] )->middleware('guard:admin');

    Route::post('/matiereProfesseurDestroy/{id}/{h}',[MatiereProfesseurController::class,'destroy'] )->middleware('guard:admin');

    /*                          END PARTIE MATIERE PROFESSEUR                        */



    /*                           PARTIE GROUPEFORMATIONS PROFESSEUR                        */

    Route::get('/groupeFormationProfesseurIndex/{id}',[GroupeFormationProfesseurController::class,'index'] )->middleware('guard:admin');

    Route::get('/groupeFormationProfesseurHome',[GroupeFormationProfesseurController::class,'home'] )->middleware('guard:admin');

    Route::get('/groupeFormationProfesseurCreate/{id}',[GroupeFormationProfesseurController::class,'create'] )->middleware('guard:admin');
    Route::post('/groupeFormationProfesseurCreate',[GroupeFormationProfesseurController::class,'store'] )->middleware('guard:admin');

    Route::get('/groupeFormationProfesseurShow/{id}',[GroupeFormationProfesseurController::class,'show'] )->middleware('guard:admin');
    
    Route::get('/groupeFormationProfesseurUpdate/{id}',[GroupeFormationProfesseurController::class,'edit'] )->middleware('guard:admin');
    Route::post('/groupeFormationProfesseurUpdate/{id}',[GroupeFormationProfesseurController::class,'update'] )->middleware('guard:admin'); 

    Route::post('/groupeFormationProfesseurDestroy/{id}/{h}',[GroupeFormationProfesseurController::class,'destroy'] )->middleware('guard:admin');

    /*                          END PARTIE GROUPEFORMATIONS PROFESSEUR                        */



    /*                           PARTIE GROUPEFORMATIONS ETUDIANT                        */

    Route::get('/etudiantGroupeFormationIndex/{id}',[EtudiantGroupeFormationController::class,'index'] )->middleware('guard:admin');

    Route::get('/etudiantGroupeFormationHome',[EtudiantGroupeFormationController::class,'home'] )->middleware('guard:admin');

    Route::get('/etudiantGroupeFormationCreate/{id}',[EtudiantGroupeFormationController::class,'create'] )->middleware('guard:admin');
    Route::post('/etudiantGroupeFormationCreate',[EtudiantGroupeFormationController::class,'store'] )->middleware('guard:admin');

    Route::get('/etudiantGroupeFormationShow/{id}',[EtudiantGroupeFormationController::class,'show'] )->middleware('guard:admin');
    
    Route::get('/etudiantGroupeFormationUpdate/{id}',[EtudiantGroupeFormationController::class,'edit'] )->middleware('guard:admin');
    Route::post('/etudiantGroupeFormationUpdate/{id}',[EtudiantGroupeFormationController::class,'update'] )->middleware('guard:admin'); 

    Route::post('/etudiantGroupeFormationDestroy/{id}/{h}',[EtudiantGroupeFormationController::class,'destroy'] )->middleware('guard:admin');

    /*                          END PARTIE GROUPEFORMATIONS ETUDIANT                        */
    
/***********************************************   END DASHBOARD ADMIN    **********************************************/




/***********************************************   DASHBOARD ETUDIANT    **********************************************/
    
    Route::get('/Etudiantprofile', [EtudiantDashController::class, 'profile'], function () {
        return view('EtudiantDash/profile/Eudiantprofile');
    })->middleware('guard:etudiant');

    Route::get('/Etudiantformation', [EtudiantDashController::class, 'formation'], function () {
        return view('EtudiantDash/formation/index');
    })->middleware('guard:etudiant');

    Route::get('/Etudiantpaiement', [EtudiantDashController::class, 'paiement'])->middleware('guard:etudiant');

    Route::get('/Etudiantpaiement', [EtudiantDashController::class, 'paiement'])->middleware('guard:etudiant');
    
    Route::get('/Etudiantfichier', [EtudiantDashController::class, 'fichier'])->middleware('guard:etudiant');

    Route::resource('etudiantDash',EtudiantDashController::class)->middleware('guard:etudiant');

/***********************************************   END DASHBOARD ETUDIANT    **********************************************/



/***********************************************   DASHBOARD PROFESSEUR    **********************************************/

    Route::resource('fichiers',FichierController::class)->middleware('guard:professeur');
    
    Route::get('/Professeurformation', [ProfesseurDashController::class, 'formation'], function () {
        return view('ProfesseurDash/formation/index');
    })->middleware('guard:professeur');

    Route::get('/Professeurprofile', [ProfesseurDashController::class, 'profile'])->middleware('guard:professeur');

    Route::resource('professeurDash',ProfesseurDashController::class)->middleware('guard:professeur');

/***********************************************   END DASHBOARD PROFESSEUR    **********************************************/