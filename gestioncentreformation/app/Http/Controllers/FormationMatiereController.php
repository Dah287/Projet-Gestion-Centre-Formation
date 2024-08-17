<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\FormationMatiere;
 
class FormationMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $formationMatiere = FormationMatiere:: where('formation_id',$id)->orderBy('id', 'ASC')->get();
        return view('AdminDash.formationMatiere.index', compact('formationMatiere','id'));
    }


    /**
     * To redirect to all matieres of all formations
     */
    public function home()
    {        
        $formationMatieres = FormationMatiere::paginate(5);
        //$formationMatiere = FormationMatiere:: orderBy('id', 'ASC')->get();
        return view('AdminDash.formationMatiere.home', compact('formationMatieres'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $matieres = Matiere::all();
        $formations = Formation::all();
        return view('AdminDash.formationMatiere.create', compact('matieres','formations','id'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'formation_id' => 'required',            
            'matiere_id' => 'required',
            'masseHorraire' => 'required'

        ]);

        // Enregistrez les données dans la table matiéres
        FormationMatiere::create([
            'matiere_id' => strip_tags($request->input('matiere_id')),
            'formation_id' => strip_tags($request->input('formation_id')),
            'masseHorraire' => strip_tags($request->input('masseHorraire'))
        ]);

        return redirect('/formationMatiereIndex/'.$request->input('formation_id'))->with('success', 'Matiére formation added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formationMatiere = FormationMatiere::findOrFail($id); 
        return view('AdminDash.formationMatiere.show', compact('formationMatiere','id'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formationMatiere = FormationMatiere::findOrFail($id);
        $matieres = Matiere::all();
        return view('AdminDash.formationMatiere.edit', compact('formationMatiere','matieres','id'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formationMatiere = FormationMatiere::findOrFail($id);
        $formationMatiere->update($request->all());
        return redirect('/formationMatiereIndex/'.$formationMatiere->formation_id)->with('success', 'Matiére formation updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id, string $h)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $formationMatiere = FormationMatiere::findOrFail($id);  
        $a = $formationMatiere->formation_id;
        $formationMatiere->delete();
      
        if($h=='1'){
            return redirect('/formationMatiereIndex/'.$a)->with('success', 'Matiére formation deleted successfully');
        }
        else
            return redirect('/formationMatiereHome')->with('success', 'Matiére formation deleted successfully');
    }
    
}

