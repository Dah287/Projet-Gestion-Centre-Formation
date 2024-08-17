<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professeur;
use App\Models\Matiere;


class MatiereProfesseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'matiere_id',
        'professeur_id'
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
