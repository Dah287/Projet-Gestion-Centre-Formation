<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\GroupeFormation;
use App\Models\EtudiantGroupeFormation;

class EtudiantGroupeFormationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {    
        $etudiantGroupeFormation = EtudiantGroupeFormation:: where('etudiant_id',$id)->orderBy('id', 'ASC')->get();
        return view('AdminDash.etudiantGroupeFormation.index', compact('etudiantGroupeFormation','id'));
    }


    /**
     * To redirect to all formations of all etudiants
     */
    public function home()
    {   
        $etudiantGroupeFormations = EtudiantGroupeFormation::paginate(5);
       // $etudiantGroupeFormations = EtudiantGroupeFormation:: orderBy('id', 'ASC')->get();
        return view('AdminDash.etudiantGroupeFormation.home', compact('etudiantGroupeFormations'));
    }
 
 
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $etudiants = Etudiant::all();
        $groupeFormations = GroupeFormation::all();
        return view('AdminDash.etudiantGroupeFormation.create', compact('etudiants','groupeFormations','id'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Enregistrez les données dans la table matiéres
        EtudiantGroupeFormation::create([
            'groupe_formation_id' => strip_tags($request->input('groupe_formation_id')),
            'etudiant_id' => strip_tags($request->input('etudiant_id'))        ]);

        return redirect('/etudiantGroupeFormationIndex/'.$request->input('etudiant_id'))->with('success', 'Groupe formation de l\'étudiant added successfully');

    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etudiantGroupeFormation = EtudiantGroupeFormation::findOrFail($id); 
        return view('AdminDash.etudiantGroupeFormation.show', compact('etudiantGroupeFormation','id'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiantGroupeFormation = EtudiantGroupeFormation::findOrFail($id);
        $groupeFormations = GroupeFormation::all();
        return view('AdminDash.etudiantGroupeFormation.edit', compact('groupeFormations','etudiantGroupeFormation','id'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etudiantGroupeFormation = EtudiantGroupeFormation::findOrFail($id);
        $etudiantGroupeFormation->update($request->all());
        
        return redirect('/etudiantGroupeFormationIndex/'.$etudiantGroupeFormation->etudiant_id)->with('success', 'Groupe formation de l\'étudiant updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id, string $h)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $etudiantGroupeFormation = EtudiantGroupeFormation:: findOrFail($id);  
        $a = $etudiantGroupeFormation->etudiant_id;
        $etudiantGroupeFormation->delete();
        
        if($h=='1'){
            return redirect('/etudiantGroupeFormationIndex/'.$a)->with('success', 'Groupe formation de l\'étudiant deleted successfully');
        }
        else
            return redirect('/etudiantGroupeFormationHome')->with('success', 'Groupe formation de l\'étudiant deleted successfully');
    }}
