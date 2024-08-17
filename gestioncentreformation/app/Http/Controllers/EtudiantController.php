<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\EtudiantFormation;
use App\Models\Formation;
use App\Models\GroupeFormation;
use App\Models\EtudiantGroupeFormation;
use App\Models\Paiement;

 
class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::paginate(5);
       // $etudiant = etudiant::orderBy('id', 'ASC')->get();
        return view('AdminDash.etudiant.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminDash.etudiant.create');
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'email' => 'required|email',
            'pass' => 'required',            
            'dateInscription' => 'required|date',
            'tel' => 'required|digits:10',            
            'adresse' => 'required',
            'CIN'=> 'required'
        ]);

        // Enregistrez les données dans la table etudiants
        Etudiant::create([
            //strip_tags()==> pour nettoyer les données entrées par l'utilisateur dans un formulaire
            'nom' => strip_tags($request->input('nom')) , 
            'prenom' => strip_tags($request->input('prenom')),
            'email' => strip_tags($request->input('email')),
            'pass' => strip_tags($request->input('pass')),            
            'dateInscription' => strip_tags($request->input('dateInscription')),
            'tel' => strip_tags($request->input('tel')),
            'adresse' => strip_tags($request->input('adresse')),
            'CIN' => strip_tags($request->input('CIN'))
        ]);

        return redirect()->route('etudiant.index')->with('success', 'Etudiant added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etudiant = Etudiant::findOrFail($id); 
        $etudiantFormations = EtudiantFormation:: where('etudiant_id',$id)->orderBy('id', 'ASC')->get();
        $etudiantGroupeFormations = EtudiantGroupeFormation:: where('etudiant_id',$id)->orderBy('id', 'ASC')->get();
        $formations = Formation::all();        
        return view('AdminDash.etudiant.show', compact('etudiant','etudiantFormations','formations','etudiantGroupeFormations','id'));
    }

        /**
     * Show paiement in student dashboard
     */
    public function showEtudiant(string $id)
    {
        $etudiant = Etudiant::findOrFail($id); 
        $paiements = Paiement:: where('etudiant_id',$id)->orderBy('id', 'ASC')->get();
        return view('AdminDash.etudiant.showEtudiant', compact('paiements','etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('AdminDash.etudiant.edit', compact('etudiant'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required',            
            'dateInscription' => 'required|date',              
            'tel' => 'required|digits:10',            
            'adresse' => 'required',
            'CIN'=> 'required'
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return redirect()->route('etudiant.index')->with('success', 'Etudiant updated successfully');
    }
 
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $etudiant = Etudiant::findOrFail($id);  
        $etudiant->delete();
 
        return redirect()->route('etudiant.index')->with('success', 'Etudiant deleted successfully');
    }
}

