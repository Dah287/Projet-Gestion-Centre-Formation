<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\EtudiantFormation;
 
class EtudiantFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {   
        $etudiantFormation = EtudiantFormation:: where('etudiant_id',$id)->orderBy('id', 'ASC')->get();
        return view('AdminDash.etudiantFormation.index', compact('etudiantFormation','id'));
    }


    /**
     * To redirect to all formations of all etudiants
     */
    public function home()
    {   
        $etudiantFormations = EtudiantFormation::paginate(5);
       // $etudiantFormation = EtudiantFormation:: orderBy('id', 'ASC')->get();
        return view('AdminDash.etudiantFormation.home', compact('etudiantFormations'));
    }
 
 
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $etudiants = Etudiant::all();
        $formations = Formation::all();
        return view('AdminDash.etudiantFormation.create', compact('etudiants','formations','id'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Enregistrez les données dans la table matiéres
        EtudiantFormation::create([
            'formation_id' => strip_tags($request->input('formation_id')),
            'etudiant_id' => strip_tags($request->input('etudiant_id')),
            'nvPrix' => strip_tags($request->input('nvPrix'))
        ]);

        return redirect('/etudiantFormationIndex/'.$request->input('etudiant_id'))->with('success', 'Formation d\'étudiant added successfully');

    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etudiantFormation = EtudiantFormation::findOrFail($id); 
        return view('AdminDash.etudiantFormation.show', compact('etudiantFormation','id'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiantFormation = EtudiantFormation::findOrFail($id);
        $formations = Formation::all();
        return view('AdminDash.etudiantFormation.edit', compact('formations','etudiantFormation','id'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etudiantFormation = EtudiantFormation::findOrFail($id);
        $etudiantFormation->update($request->all());
        
        return redirect('/etudiantFormationIndex/'.$etudiantFormation->etudiant_id)->with('success', 'Formation d\'étudiant updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id, string $h)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $etudiantFormation = EtudiantFormation:: findOrFail($id);  
        $a = $etudiantFormation->etudiant_id;
        $etudiantFormation->delete();
        
        if($h=='1'){
            return redirect('/etudiantFormationIndex/'.$a)->with('success', 'Formation d\'étudiant deleted successfully');
        }
        else
            return redirect('/etudiantFormationHome')->with('success', 'Formation d\'étudiant deleted successfully');
    }
    
}

