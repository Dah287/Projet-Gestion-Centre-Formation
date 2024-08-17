<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Salle;
 
class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::paginate(5);
        //$salles = salle::orderBy('id', 'ASC')->get();
        return view('AdminDash.salle.index', compact('salles'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminDash.salle.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomSalle' => 'required',
            'capacité' => 'required',
            'type' => 'required'
        ]);

        salle::create([
            'nomSalle' => $request->input('nomSalle'),
            'capacite' => $request->input('capacité'),
            'type' => $request->input('type')
        ]);
 
        return redirect()->route('salle.index')->with('success', 'Salle added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salle = salle::findOrFail($id); 
 
        return view('AdminDash.salle.show', compact('salle'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salle = salle::findOrFail($id);
 
        return view('AdminDash.salle.edit', compact('salle'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $salle = salle::findOrFail($id);
 
        $salle->update($request->all());
 
        return redirect()->route('salle.index')->with('success', 'Salle updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salle = salle::findOrFail($id);  // findOrFail => récupérer un modèle à partir de sa clé primaire...
 
        $salle->delete();
 
        return redirect()->route('salle.index')->with('success', 'Salle deleted successfully');
    }
}

