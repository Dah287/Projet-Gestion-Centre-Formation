<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\Professeur;
use Illuminate\Http\Request;
use App\Models\GroupeFormation;
use App\Models\FormationMatiere;
use App\Models\MatiereProfesseur;
use Illuminate\Support\Facades\Session;


class ProfesseurDashController extends Controller
{

//=================================== Index Professeur Content ===============================//
    public function index()
    {
        $professeur = Professeur::find(Session::get('id'));

        $nombreEtudiants = Etudiant::count();
        $nombreProfesseurs = Professeur::count();
        $nombreGroupes = GroupeFormation::count();
        $nombreFormations = Formation::count();
        
        $formation4 = Formation::orderBy('created_at', 'desc')->skip(0)->take(1)->first();
        $formation3 = Formation::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $formation2 = Formation::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
        $formation1 = Formation::orderBy('created_at', 'desc')->skip(3)->take(1)->first();

        return view('ProfesseurDash/indexProfesseur',compact('nombreEtudiants','nombreProfesseurs','nombreGroupes','nombreFormations','formation4','formation3','formation2','formation1','professeur'));

    }
//=============================== End Index Professeur Content =================================//

    public function profile(Request $request)
    {
            $professeur = Professeur::find(Session::get('id'));
            return view('ProfesseurDash/profile/Professeurprofile',compact('professeur'));
    }

    public function emploi(Request $request)
    {
            $professeur = Professeur::find(Session::get('id'));
            return view('ProfesseurDash/emplois/index',compact('professeur'));
    }

    public function formation(Request $request)
    {
        $professeur = Professeur::find(Session::get('id'));
        $matiereProfesseur = MatiereProfesseur::where('professeur_id', $professeur->id)->get();
        
        $formations = [];
        foreach ($matiereProfesseur as $matiere) {
            $formationMatieres = FormationMatiere::where('matiere_id', $matiere->matiere_id)->get();
            foreach ($formationMatieres as $formationMatiere) {
                $formationComplete = Formation::find($formationMatiere->formation_id);
                $formationComplete->masseHorraire = $formationMatiere->masseHorraire;
                $formations[] = $formationComplete;
            }
        }
        
        return view('ProfesseurDash/formation/index', ['formations' => $formations],compact('professeur','matiereProfesseur','formations'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {

        }


    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            
        }

    /**
     * Display the specified resource.
     */
        public function show(string $id)
        {
            
        }

            // Modifier le profile
    
        /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $professeur = Professeur::find(Session::get('id'));
        $professeur = Professeur::findOrFail($professeur->id);
        return view('ProfesseurDash.profile.edit', compact('professeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required',            
            'tel' => 'required|digits:10',            
        ]);

        $professeur = Professeur::findOrFail($id);
        $professeur->update($request->all());
        return redirect()->route('professeurDash.index')->with('success', 'Profile updated successfully');
    }   
        
    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
        {
            
        }

}
