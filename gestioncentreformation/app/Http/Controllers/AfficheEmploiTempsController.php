<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\EmploiTemps;



class AfficheEmploiTempsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   /* public function index()
    {
        $afficheEmploiTemps = EmploiTemps::orderBy('id', 'ASC')->get();
        return view('afficheEmploiTemps.index', compact('afficheEmploiTemps'));
    }

    
    /**
     * Display the specified resource.
     */
    public function index()
    {
        /* $afficheEmploiTemps = DB::table('emploi_temps')
        ->where('id', 1)
        ->pluck('dateSession');
       // ->first();*/

      /* $resultats = DB::table('emploi_temps')
       ->select('emploi_temps.dateSession', 'matieres.nomMatiere', 'formations.specialite')
       ->join('matiere_formation', 'emploi_temps.matiere_formation_id', '=', 'matiere_formation.id')
       ->join('formations', 'matiere_formation.formation_id', '=', 'formations.id')
       ->join('matieres', 'matiere_formation.matiere_id', '=', 'matieres.id')
       ->where('id', 1)
       ->get();*/


       $resultats = DB::table('emploi_temps')
       ->select('emploi_temps.dateSession', 'matieres.nomMatiere', 'formations.specialite')
       ->join('emploi_temps', 'emploi_temps.idProfeseur', '=', 'professeur.id')
       // ->join('emploi_temps', 'emploi_temps.idGroupeFormation', '=', 'groupeFormation.id')
       ->join('matiere_formation', 'professeurs.matiere_formation_id', '=', 'matiere_formation.id')
       ->join('formations', 'matiere_formation.idFormation', '=', 'formations.id')
       ->join('matieres', 'matiere_formation.idMatiere', '=', 'matieres.id')
       ->where('id', 1)
       ->get();



       // $emploiTemps = emploiTemps::findOrFail($id); 
        return view('afficheEmploiTemps.index', compact('emplois'));
    }
}

