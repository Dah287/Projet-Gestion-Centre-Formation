<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date',
        'professeur_id',
        'salle_id',
        'groupe_formation_id'
    ];

    protected $table = 'emploi_temps';


    public function professeur(){
        return $this->belongsTo(Professeur::class);
    }

    public function salle(){
        return $this->belongsTo(Salle::class);
    }

    public function groupeFormation(){
        return $this->belongsTo(GroupeFormation::class);
    }
}
