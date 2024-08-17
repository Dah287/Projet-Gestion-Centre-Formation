<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmploiTemps;
use App\Models\Formation;
use App\Models\Fichier;
use App\Models\Professeur;

 
class GroupeFormation extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'nomGroupe',
        'formation_id'
    ];

    public function emploiTemps(){
        return $this->belongsTo(EmploiTemps::class);
    }

    public function formation(){
        return $this->belongsTo(Formation::class);
    }

    public function fichier(){
        return $this->hasMany(Fichier::class);
    }

    public function professeur(){
        return $this->belongsToMany(Fichier::class);
    }

    
    public function emploi(){
        return $this->hasMany(Emploi::class);
    }
    
}