<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'horaire',
        'salle',
        'programme_id',
        'annee_universitaire_id',
        'promotion_id',
        'enseignant_id',
        'matiere_id',
        'semestre_id',
    ];

    public function programme() {
        return $this->belongsTo(Programme::class);
    }

    public function annee_universitaire() {
        return $this->belongsTo(AnneeUniversitaire::class);
    }

    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }

    public function enseignant() {
        return $this->belongsTo(Enseignant::class);
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    public function semestre() {
        return $this->belongsTo(Semestre::class);
    }
}
