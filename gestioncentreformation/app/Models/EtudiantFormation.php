<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Formation;


class EtudiantFormation extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'formation_id',
        'nvPrix'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
