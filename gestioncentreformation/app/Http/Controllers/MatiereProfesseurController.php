<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Models\Matiere;
use App\Models\MatiereProfesseur;
 
class MatiereProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        
        $matiereProfesseur = MatiereProfesseur:: where('professeur_id',$id)-> orderBy('id', 'ASC')->get();
        return view('AdminDash.matiereProfesseur.index', compact('matiereProfesseur','id'));
    }

    /**
     * To redirect to all matieres of all professeurs
     */
    public function home()
    {    
        $matiereProfesseurs = MatiereProfesseur::paginate(5);
        //$matiereProfesseurs = MatiereProfesseur:: orderBy('id', 'ASC')->get();
        return view('AdminDash.matiereProfesseur.home', compact('matiereProfesseurs'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $matieres = Matiere::all();
        $professeurs = Professeur::all();
        return view('AdminDash.matiereProfesseur.create', compact('matieres','professeurs','id'));

    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Enregistrez les données dans la table matiéres
        MatiereProfesseur::create([
            'matiere_id' => strip_tags($request->input('matiere_id')),
            'professeur_id' => strip_tags($request->input('professeur_id'))
        ]);

        return redirect('/matiereProfesseurIndex/'.$request->input('professeur_id'))->with('success', 'Matiére professeur added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matiereProfesseur = MatiereProfesseur::findOrFail($id); 
 
        return view('AdminDash.matiereProfesseur.show', compact('matiereProfesseur','id'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matiereProfesseur = MatiereProfesseur::findOrFail($id);
        $matieres= Matiere::all();
        return view('AdminDash.matiereProfesseur.edit', compact('matiereProfesseur','matieres','id'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matiereProfesseur = MatiereProfesseur::findOrFail($id);
        $matiereProfesseur->update($request->all());

        return redirect('/matiereProfesseurIndex/'.$matiereProfesseur->professeur_id)->with('success', 'Matiére professeur updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id, string $h)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $matiereProfesseur = MatiereProfesseur::findOrFail($id); 
        $a = $matiereProfesseur->professeur_id; 
        $matiereProfesseur->delete();
 
        if($h=='1'){
            return redirect('/matiereProfesseurIndex/'.$a)->with('success', 'Matiére professeur deleted successfully');
        }
        else
            return redirect('/matiereProfesseurHome')->with('success', 'Matiére professeur deleted successfully');
    }
}

