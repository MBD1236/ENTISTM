<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "prenom",
        "telephone",
        "email",
        "photo",
        "pv",
        "ine",
        "session",
        "profil",
        "centre",
        "ecole_origine",
        "date_naissance",
        "lieu_naissance",
        "pere",
        "mere",
        "programme",
        "nomtuteur",
        "telephone_tuteur",
        "adresse",
        "diplome",
        "releve_notes",
        "certificatnationalite",
        "certificat_medical",
        "extrait_naissance",
    ];


    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
}
