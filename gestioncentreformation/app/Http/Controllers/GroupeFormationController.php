<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\GroupeFormation;
use Illuminate\Support\Facades\DB;
use App\Models\Formation;
//use App\Models\EmploiTemps;


class GroupeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupeFormations = GroupeFormation::paginate(5);
        //$groupeFormation = GroupeFormation::orderBy('id', 'ASC')->get();
        return view('AdminDash.groupeFormation.index', compact('groupeFormations'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formations = Formation::all();        
        return view('AdminDash.groupeFormation.create', compact('formations')); 

    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nomGroupe' => 'required|string',
        ]);

        // dd($request);

        groupeFormation::create([
            'nomGroupe' => $request->input('nomGroupe'),
            'formation_id' => $request->input('formation_id')
        ]);

        return redirect()->route('groupeFormation.index')->with('success', 'Groupe de Formation added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupeFormation = groupeFormation::findOrFail($id); 
        return view('AdminDash.groupeFormation.show', compact('groupeFormation'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groupeFormation = groupeFormation::findOrFail($id);
 
        return view('AdminDash.groupeFormation.edit', compact('groupeFormation'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupeFormation = groupeFormation::findOrFail($id);
 
        $groupeFormation->update($request->all());
 
        return redirect()->route('groupeFormation.index')->with('success', 'Groupe de formation updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupeFormation = groupeFormation::findOrFail($id);  // findOrFail => récupérer un modèle à partir de sa clé primaire...
 
        $groupeFormation->delete();
 
        return redirect()->route('groupeFormation.index')->with('success', 'Groupe de formation deleted successfully');
    }

}

