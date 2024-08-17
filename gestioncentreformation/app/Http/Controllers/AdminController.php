<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Salle;
use App\Models\Emploi;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\Professeur;
use Illuminate\Http\Request;
use App\Models\GroupeFormation;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

//=================================== Index Admin Content ===============================//
    public function index()
    {
        $nombreEtudiants = Etudiant::count();
        $nombreProfesseurs = Professeur::count();
        $nombreGroupes = GroupeFormation::count();
        $nombreFormations = Formation::count();
        
        $formation4 = Formation::orderBy('created_at', 'desc')->skip(0)->take(1)->first();
        $formation3 = Formation::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $formation2 = Formation::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
        $formation1 = Formation::orderBy('created_at', 'desc')->skip(3)->take(1)->first();

        return view('AdminDash/indexAdmin',compact('nombreEtudiants','nombreProfesseurs','nombreGroupes','nombreFormations','formation4','formation3','formation2','formation1'));

    }

//=============================== End Index Admin Content =================================//

//=================================== Emploi =========================================
       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeurs = Professeur::all();
        $salles = Salle::all();
        $groupeFormations = GroupeFormation::all();
        return view('AdminDash.emplois.create', compact('professeurs','salles','groupeFormations'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  

        // Enregistrez les données dans la table etudiants
        Emploi::create([
            //strip_tags()==> pour nettoyer les données entrées par l'utilisateur dans un formulaire
            'date' => strip_tags($request->input('date')) , 
            'professeur_id' => strip_tags($request->input('professeur_id')),
            'salle_id' => strip_tags($request->input('salle_id')),
            'groupe_formation_id' => strip_tags($request->input('groupe_formation_id'))
        ]);

        return redirect()->route('emploi.index')->with('success', 'Emploi added successfully');
    }

    
    public function emploi(Request $request)
    {
            $admin = Admin::find(Session::get('id'));
            return view('AdminDash/emplois/index',compact('admin'));
    }
//======================================== End Emploi =====================================
        

    public function index3()
    {

        $etudiant4 = Etudiant::orderBy('created_at', 'desc')->skip(0)->take(1)->first();
        $etudiant3 = Etudiant::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $etudiant2 = Etudiant::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
        $etudiant1 = Etudiant::orderBy('created_at', 'desc')->skip(3)->take(1)->first();

        return view('AdminDash/indexAdmin',compact('etudiant4','etudiant3','etudiant2','etudiant1'));
    }



    public function profile(Request $request)
    {
            $admin = Admin::find(Session::get('id'));
            return view('AdminDash/Adminprofile',compact('admin'));
    
    }

}
