<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Models\GroupeFormation;
use App\Models\GroupeFormationProfesseur;
 
class GroupeFormationProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        
        $groupeFormationProfesseur = GroupeFormationProfesseur:: where('professeur_id',$id)-> orderBy('id', 'ASC')->get();
        return view('AdminDash.groupeFormationProfesseur.index', compact('groupeFormationProfesseur','id'));
    }

    /**
     * To redirect to all groupesFormations of all professeurs
     */
    public function home()
    {        
        $groupeFormationProfesseurs = GroupeFormationProfesseur::paginate(5);
       // $groupeFormationProfesseur = GroupeFormationProfesseur:: orderBy('id', 'ASC')->get();
        return view('AdminDash.groupeFormationProfesseur.home', compact('groupeFormationProfesseurs'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $groupeFormations = GroupeFormation::all();
        $professeurs = Professeur::all();
        return view('AdminDash.groupeFormationProfesseur.create', compact('groupeFormations','professeurs','id'));

    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Enregistrez les données dans la table matiéres
        GroupeFormationProfesseur::create([
            'groupe_formation_id' => strip_tags($request->input('groupe_formation_id')),
            'professeur_id' => strip_tags($request->input('professeur_id'))
        ]);

        return redirect('/groupeFormationProfesseurIndex/'.$request->input('professeur_id'))->with('success', 'Groupe formation pprofesseur added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupeFormationProfesseur = GroupeFormationProfesseur::findOrFail($id); 
 
        return view('AdminDash.groupeFormationProfesseur.show', compact('groupeFormationProfesseur','id'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groupeFormationProfesseur = GroupeFormationProfesseur::findOrFail($id);
        $groupeFormations= GroupeFormation::all();
        return view('groupeFormationProfesseur.edit', compact('groupeFormationProfesseur','groupeFormations','id'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupeFormationProfesseur = GroupeFormationProfesseur::findOrFail($id);
        $groupeFormationProfesseur->update($request->all());

        return redirect('/groupeFormationProfesseurIndex/'.$groupeFormationProfesseur->professeur_id)->with('success', 'Groupe formation professeur updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id, string $h)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $groupeFormationProfesseur = GroupeFormationProfesseur::findOrFail($id); 
        $a = $groupeFormationProfesseur->professeur_id; 
        $groupeFormationProfesseur->delete();
 
        if($h=='1'){
            return redirect('/groupeFormationProfesseurIndex/'.$a)->with('success', 'Groupe formation professeur deleted successfully');
        }
        else
            return redirect('/groupeFormationProfesseurHome')->with('success', 'Groupe formation professeur deleted successfully');
    }
}

