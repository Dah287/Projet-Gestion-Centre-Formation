<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Models\Matiere;
use App\Models\GroupeFormation;
use App\Models\GroupeFormationProfesseur;
use App\Models\MatiereProfesseur;
 
class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professeurs = Professeur::paginate(5);
       // $professeurs = Professeur::orderBy('id', 'DESC')->get();
        return view('AdminDash.professeur.index', compact('professeurs'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matieres = Matiere::all();
        $matiereProfesseurs = MatiereProfesseur::all();
        return view('AdminDash.professeur.create', compact('matieres', 'matiereProfesseurs'));  
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        professeur::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),            
            'tel' => $request->input('tel'),
            'idMatiere' => $request->input('matiere_id'),
        ]);
  
        return redirect()->route('professeur.index')->with('success', 'Professeur added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $professeur = Professeur::findOrFail($id);
        $groupeFormationProfesseurs = GroupeFormationProfesseur:: where('professeur_id',$id)->orderBy('id', 'ASC')->get();
        $matiereProfesseurs = MatiereProfesseur :: where('professeur_id',$id)->orderBy('id', 'ASC')->get();
        return view('AdminDash.professeur.show', compact('professeur','groupeFormationProfesseurs','matiereProfesseurs'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professeur = Professeur::findOrFail($id);
 
        return view('AdminDash.professeur.edit', compact('professeur'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $professeur = Professeur::findOrFail($id);
 
        $professeur->update($request->all());
 
        return redirect()->route('professeur.index')->with('success', 'Professeur updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professeur = Professeur::findOrFail($id);
 
        $professeur->delete();
 
        return redirect()->route('professeur.index')->with('success', 'Professeur deleted successfully');
    }
}