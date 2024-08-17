<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Matiere;

 
class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::paginate(5);
        //$formation = formation::orderBy('id', 'ASC')->get();
        return view('AdminDash.formation.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matieres = Matiere::all();
        return view('AdminDash.formation.create', compact('matieres'));      
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'specialite' => 'required',            
            'prix' => 'required|numeric',
            'periode' => 'required',
        ]);

        formation::create([
            'specialite' => $request->input('specialite'),
            'prix' => $request->input('prix'),
            'periode' => $request->input('periode'),
        ]);
 
        return redirect()->route('formation.index')->with('success', 'Formation added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formation = formation::findOrFail($id); 
 
        return view('AdminDash.formation.show', compact('formation'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formation = formation::findOrFail($id);
 
        return view('AdminDash.formation.edit', compact('formation'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formation = formation::findOrFail($id);
 
        $formation->update($request->all());
 
        return redirect()->route('formation.index')->with('success', 'Formation updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formation = formation::findOrFail($id);  // findOrFail => récupérer un modèle à partir de sa clé primaire...
 
        $formation->delete();
 
        return redirect()->route('formation.index')->with('success', 'Formation deleted successfully');
    }
}

