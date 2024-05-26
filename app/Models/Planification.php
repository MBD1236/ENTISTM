<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    use HasFactory;

    protected $fillable = [
        'enseignant_id',
        'matiere_id',
        'niveau_id',
        'promotion_id',
        'programme_id',
        'semestre_id',
    ];


    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }
    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }
    public function programme() {
        return $this->belongsTo(Programme::class);
    }
    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }
    public function enseignant() {
        return $this->belongsTo(Enseignant::class);
    }
    public function semestre() {
        return $this->belongsTo(Semestre::class);
    }
}
