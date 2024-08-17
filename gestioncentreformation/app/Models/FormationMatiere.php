<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Matiere;

class FormationMatiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere_id',
        'formation_id',
        'masseHorraire'
    ];


    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
