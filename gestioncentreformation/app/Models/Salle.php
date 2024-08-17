<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmploiTemps;
 
class Salle extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'nomSalle',
        'capacite',
        'type' 
    ];

    public function emploiTemps(){
        return $this->hasMany(EmploiTemps::class);
    }

    public function emploi(){
        return $this->hasMany(Emploi::class);
    }
}