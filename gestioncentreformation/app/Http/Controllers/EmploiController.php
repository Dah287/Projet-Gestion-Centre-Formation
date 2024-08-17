<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\GroupeFormation;
use App\Models\Professeur;
use App\Models\Salle;
use App\Models\Emploi;


 
class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emploi = Emploi::paginate(5);
       // $etudiant = etudiant::orderBy('id', 'ASC')->get();
        return view('AdminDash.emplois.index', compact('emploi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeurs = Professeur::all();
        $salles = Salle::all();
        $groupeFormations = GroupeFormation::all();
        return view('AdminDash.emploi.create', compact('professeurs','salles','groupeFormations'));
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
         'dateSession' => 'required|date_format:Y-m-d H:i:s',  // Vérifie que la valeur correspond au format de date et d'heure spécifié
        ]);

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
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $emploi = Emploi::findOrFail($id);  
        $emploi->delete();
 
        return redirect()->route('AdminDash.emploi.index')->with('success', 'Emploi deleted successfully');
    }
}

