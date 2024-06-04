<?php

namespace App\Models;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'enseignant_id',
    ];

    public function enseignant() {
        return $this->belongsTo(Enseignant::class);
    }
}
