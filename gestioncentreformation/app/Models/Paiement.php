<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Formation;


class Paiement extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'montant',
        'datePaiement',
        'reste',
        'etudiant_id',
        'formation_id'
    ];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }

    public function formation(){
        return $this->belongsTo(Formation::class);
    }
}
