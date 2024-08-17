<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Paiement;
use App\Models\Formation;
use App\Models\Professeur;
use Illuminate\Http\Request;
use App\Models\GroupeFormation;
use App\Models\FormationMatiere;
use App\Models\EtudiantFormation;
use App\Models\Fichier;
use Illuminate\Support\Facades\Session;


class EtudiantDashController extends Controller
{
    
//=================================== Index Etudiant Content ===============================//
    public function index()
    {
        $etudiant = Etudiant::find(Session::get('id'));

        $nombreEtudiants = Etudiant::count();
        $nombreProfesseurs = Professeur::count();
        $nombreGroupes = GroupeFormation::count();
        $nombreFormations = Formation::count();
        
        $formation4 = Formation::orderBy('created_at', 'desc')->skip(0)->take(1)->first();
        $formation3 = Formation::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $formation2 = Formation::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
        $formation1 = Formation::orderBy('created_at', 'desc')->skip(3)->take(1)->first();

        return view('EtudiantDash/indexEtudiant',compact('nombreEtudiants','nombreProfesseurs','nombreGroupes','nombreFormations','formation4','formation3','formation2','formation1','etudiant'));

    }
//=============================== End Index Etudiant Content =================================//

    /**
     * Profile de l'étudiant
     */
    public function profile(Request $request)
    {
            $etudiant = Etudiant::find(Session::get('id'));
            return view('EtudiantDash/profile/Etudiantprofile',compact('etudiant'));
    }

    /**
     * Emploi de temps de l'étudiant
     */

    public function emploi(Request $request)
    {
            $etudiant = Etudiant::find(Session::get('id'));
            return view('EtudiantDash/emplois/index',compact('etudiant'));
    }

    /**
     * Les formations de l'étudiant
     */

    public function formation(Request $request)
    {
        // Trouver l'étudiant en utilisant l'ID de session
        $etudiant = Etudiant::find(Session::get('id'));

        // Trouver les enregistrements dans la table 'etudiantFormation' pour l'étudiant donné
        $etudiantFormation = EtudiantFormation::where('etudiant_id', $etudiant->id)->get();

        // Parcourir les enregistrements 'etudiantFormation' pour obtenir les IDs des formations
        $formationIds = $etudiantFormation->pluck('formation_id');

        // Trouver les enregistrements dans la table 'formationMatiere' correspondant aux IDs de formation
        $matieres = FormationMatiere::whereIn('formation_id', $formationIds)->distinct()->get();

        return view('EtudiantDash/formation/index',compact('etudiant','etudiantFormation','formationIds','matieres'));
    }

    /**
     * Les paiements de l'étudiant
     */
    public function paiement(Request $request)
    {
        $etudiant = Etudiant::find(Session::get('id'));
        $etudiantPaiement = Paiement::where('etudiant_id', $etudiant->id)->get();
        return view('EtudiantDash/paiement/index',compact('etudiant','etudiantPaiement'));
    }

    /**
     * Les fichiers de l'étudiant
     */
    public function fichier(Request $request)
    {
         // Trouver l'étudiant en utilisant l'ID de session
         $etudiant = Etudiant::find(Session::get('id'));

         // Trouver les enregistrements dans la table 'etudiantFormation' pour l'étudiant donné
         $etudiantFormation = EtudiantFormation::where('etudiant_id', $etudiant->id)->get();
 
         // Parcourir les enregistrements 'etudiantFormation' pour obtenir les IDs des formations
         $formationIds = $etudiantFormation->pluck('formation_id');
 
         // Trouver les enregistrements dans la table 'formationMatiere' correspondant aux IDs de formation
         $formationMatieres = FormationMatiere::whereIn('formation_id', $formationIds)->distinct()->get();

        // Parcourir les enregistrements 'formationMatiere' pour obtenir les IDs des matières
        $matiereIds = $formationMatieres->pluck('matiere_id');

        // Trouver les enregistrements dans la table 'fichier' pour la matière donnée
        $fichier = Fichier::whereIn('matiere_id', $matiereIds)->distinct()->get();

 
        return view('EtudiantDash/fichier/index',compact('etudiant','etudiantFormation','formationIds','formationMatieres','matiereIds','fichier'));
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
        $etudiant = Etudiant::find(Session::get('id'));
        $etudiant = Etudiant::findOrFail($etudiant->id);
        return view('EtudiantDash.profile.edit', compact('etudiant'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      /*  $validated = $request->validate([
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required',            
            'dateInscription' => 'required|date',
            'tel' => 'required|digits:10',            
            'adresse' => 'required',
            'CIN'=> 'required'
        ]);*/

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return redirect()->route('etudiantDash.index')->with('success', 'etudiant updated successfully');
    }   
        
    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
        {
            
        }

}
