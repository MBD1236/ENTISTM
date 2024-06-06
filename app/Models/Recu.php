<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recu extends Model
{
    use HasFactory;

    protected $fillable = [
        'numerorecu',
        'serie',
        'modereglement',
        'somme',
        'estVisible',
        'etudiant_id',
        'nature_recu_id',
        'departement_id',
        'promotion_id',
    ];

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    // 
    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }
    // 
    public function natureRecu() {
        return $this->belongsTo(NatureRecu::class);
    }
    // 
    public function departement() {
        return $this->belongsTo(Departement::class);
    }
    // 
    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }

    
}
