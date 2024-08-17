<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\GroupeFormation;

class EtudiantGroupeFormation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'etudiant_id',
        'groupe_formation_id'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function groupeFormation()
    {
        return $this->belongsTo(GroupeFormation::class);
    }
}
