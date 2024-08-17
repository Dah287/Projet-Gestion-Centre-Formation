<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professeur;
use App\Models\GroupeFormation;

class GroupeFormationProfesseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'groupe_formation_id',
        'professeur_id'
    ];

    public function groupeFormation()
    {
        return $this->belongsTo(GroupeFormation::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
