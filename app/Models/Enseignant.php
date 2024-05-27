<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'telephone',
        'email',
        'adresse',
        'photo',
        'departement_id',
    ];

    public function departement() {
        return $this->belongsTo(Departement::class);
    }
}
