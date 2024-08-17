<?php
 
namespace App\Http\Controllers;
 
use App\Models\Fichier;
use App\Models\Matiere;
use App\Models\MatiereProfesseur;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       $fichier = Fichier::paginate(5);
       $professeur = Professeur::find(Session::get('id'));
        $matiereProfesseurs = MatiereProfesseur::where('professeur_id', $professeur->id)->get();

        $fichiers = collect(); // Create an empty collection

        foreach ($matiereProfesseurs as $matiereProfesseur) {
            $matiereId = $matiereProfesseur->matiere_id;
            $fichiers = $fichiers->merge(Fichier::where('matiere_id', $matiereId)->get());
        }

       // $fichier = fichier::orderBy('id', 'ASC')->get();
        return view('ProfesseurDash/fichiers.index', compact('fichiers','professeur','matiereProfesseurs','fichier'));       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeur = Professeur::find(Session::get('id'));
        $matiereProfesseurs = MatiereProfesseur::where('professeur_id', $professeur->id)->get();
        
        return view('ProfesseurDash/fichiers.create',compact('professeur','matiereProfesseurs'));    
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $professeur = Professeur::find(Session::get('id'));
        $validated = $request->validate([
            'type' => 'required',
            'titre' => 'required',
            'fichier' => 'required|file|mimes:pdf|max:5000', // 5MB limit
            'video' => 'required|mimes:mp4',
        ]);
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filePath = time() . random_int(100000, 999999) . '.pdf';
            $file->move('files', $filePath);
        }
        
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . random_int(100000, 999999) . '.mp4'; // Rename the file using a timestamp
            $file->move('videos', $filename);
        }
        
        $formFields = [
            'type' => $request->input('type'),
            'fichier' => asset('files/' . $filePath),
            'video' => asset('videos/' . $filename),
            'titre' => $request->input('titre'),
            'matiere_id' => $request->input('matiere_id')
        ];
        
        Fichier::create($formFields);
        
        return redirect()->route('fichiers.index')->with('success', 'Fichier added successfully');
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $professeur = Professeur::find(Session::get('id'));
        $fichier = fichier::findOrFail($id); 
        return view('ProfesseurDash/fichiers.show', compact('fichier','professeur'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matiere = Matiere::all();     
        $professeur = Professeur::find(Session::get('id'));
        $fichier = Fichier::findOrFail($id);
        return view('ProfesseurDash/fichiers.edit', compact('fichier','professeur','matiere'));
    }

    
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fichier = fichier::findOrFail($id);
        $fichier->update($request->all());
    
        return redirect()->route('fichiers.index')->with('success', 'Fichier updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fichier = fichier::findOrFail($id);  // findOrFail => récupérer un modèle à partir de sa clé primaire...
        $fichier->delete();
 
        return redirect()->route('fichiers.index')->with('success', 'Fichier deleted successfully');
    }
}

