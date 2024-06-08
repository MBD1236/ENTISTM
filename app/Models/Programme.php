<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme',
        'departement_id'
    ];

    // pour les departements
    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    // pour les inscription
    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    // pour les attestations
    public function attestation() {
        return $this->belongsTo(Attestation::class);
    }

    // pour les etudiant
    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }
}
