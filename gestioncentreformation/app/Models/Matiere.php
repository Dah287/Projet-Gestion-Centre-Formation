<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professeur;
use App\Models\Formation;
use App\Models\Fichier;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomMatiere'
    ];

    public function professeurs(){
        return $this->belongsToMany(Professeur::class);
    }

    public function formations(){
        return $this->belongsToMany(Formation::class);
    }

    public function fichier(){
        return $this->hasMany(Fichier::class);
    }
}
