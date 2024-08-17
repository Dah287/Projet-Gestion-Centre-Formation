<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Matiere;


class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::paginate(5);
        //$matiere = Matiere::orderBy('id', 'ASC')->get();
        return view('AdminDash.matiere.index', compact('matieres'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminDash.matiere.create');    

    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nomMatiere' => 'required|string',
        ]);

        Matiere::create([
            'nomMatiere' => $request->input('nomMatiere'),
        ]);

        return redirect()->route('matiere.index')->with('success', 'Matiére added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matiere = Matiere::findOrFail($id); 
 
        return view('AdminDash.matiere.show', compact('matiere'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('AdminDash.matiere.edit', compact('matiere'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matiere = matiere::findOrFail($id);
        $matiere->update($request->all());
        return redirect()->route('matiere.index')->with('success', 'Matiére updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matiere = matiere::findOrFail($id);  // findOrFail => récupérer un modèle à partir de sa clé primaire...
 
        $matiere->delete();
 
        return redirect()->route('matiere.index')->with('success', 'Matiére deleted successfully');
    }

}

