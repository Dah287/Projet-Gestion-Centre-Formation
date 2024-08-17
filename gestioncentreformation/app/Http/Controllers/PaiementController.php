<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Etudiant;
use App\Models\formation;

 
class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiements = Paiement::paginate(5);
       // $paiements = Paiement::orderBy('id', 'ASC')->get();
        return view('AdminDash.paiement.index', compact('paiements'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants = Etudiant::all();
        $formations = Formation::all();
        $paiement = Paiement::all();
        return view('AdminDash.paiement.create', compact('etudiants', 'formations','paiement'));      
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'montant' => 'required|numeric',
            'datePaiement' => 'required|date',
           // 'reste' => 'required|numeric',
        ]);

      /*  Paiement::create([
            strip_tags()==> pour nettoyer les données entrées par l'utilisateur dans un formulaire
            'montant' => strip_tags($request->input('montant')) , 
            'datePaiement' => strip_tags($request->input('datePaiement')),            
            'reste' => strip_tags($request->input('reste')),
            'formation_id' => strip_tags($request->input('formation_id')) , 
            'etudiant_id' => strip_tags($request->input('etudiant_id'))
        ]); */

        // Valider les données du formulaire
        $request->validate([
            'montant' => 'required|numeric',
            'formation_id' => 'required|exists:formations,id',
            'datePaiement' => 'required|date',

        ]);

        // Récupérer le prix de la formation choisie
        $formation = Formation::findOrFail($request->input('formation_id'));
        $prixFormation = $formation->prix;

        // Calculer le reste du paiement
        $montantPaye = $request->input('montant');
        $datePaiement = $request->input('datePaiement');
        $formation_id = $request->input('formation_id');
        $etudiant_id = $request->input('etudiant_id');

        $restePaiement = $prixFormation - $montantPaye;

        // Enregistrer les informations de paiement dans la base de données
        $paiement = new Paiement();
        $paiement->montant = $montantPaye;
        $paiement->datePaiement = $datePaiement;
        $paiement->etudiant_id = $etudiant_id;
        $paiement->formation_id = $formation_id;

        $paiement->reste = $restePaiement;
        // Autres champs du paiement...
        $paiement->save();

        return redirect()->route('paiement.index')->with('success', 'Paiement added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paiement = Paiement::findOrFail($id); 
        return view('AdminDash.paiement.show', compact('paiement'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paiement = Paiement::findOrFail($id);
        $etudiants = Etudiant::all();
        $formations = Formation::all();
      // $paiement = Paiement::all();
        return view('AdminDash.paiement.edit', compact('etudiants', 'formations','paiement'));     
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paiement = Paiement::findOrFail($id);
        $paiement->update($request->all());
        return redirect()->route('paiement.index')->with('success', 'Paiement updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paiement = Paiement::findOrFail($id);  // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $paiement->delete();
        return redirect()->route('paiement.index')->with('success', 'Paiement deleted successfully');
    }

}


