<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        "inscription_id",
        "matiere_id",
        "note1",
        "note2",
        "note3",
        "moyenne_generale",
    ];

    public function inscription() {
        return $this->belongsTo(Inscription::class);
    }
    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }
}
