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
        "ecoleorigine",
        "datenaissance",
        "lieunaissance",
        "pere",
        "mere",
        "programme",
        "nomtuteur",
        "telephonetuteur",
        "adresse",
        "diplome",
        "relevenotes",
        "certificatnationalite",
        "certificatmedical",
        "extraitnaissance",
    ];


    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
}
