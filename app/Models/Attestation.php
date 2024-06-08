<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference_id",
        "attestation_type_id",
        "etudiant_id",
        "niveau_id",
        "annee_universitaire_id",
        "programme_id",
    ];

    // pour l'etudiant
    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }
    
    // pour le niveau
    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }

    // l'annee universitaire
    public function annee_universitaire() {
        return $this->belongsTo(AnneeUniversitaire::class);
    }

    // pour le programme
    public function programme() {
        return $this->belongsTo(Programme::class);
    }

    // pour le type d'attestation
    public function attestation_type() {
        return $this->belongsTo(AttestationType::class, "attestation_type_id");
    }

    // pour les references
    public function reference() {
        return $this->belongsTo(Reference::class, "reference_id");
    }


}
