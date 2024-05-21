<?php

namespace App\Models;

use App\Models\Departement;
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
        'departement_id',
        'photo',
    ];

    public function departement() {
        return $this->belongsTo(Departement::class);
    }
}
