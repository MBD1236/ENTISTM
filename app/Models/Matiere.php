<?php

namespace App\Models;

use App\Models\Programme;
use App\Models\Semestre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere',
        'semestre_id',
        'programme_id'
    ];

    public function semestre() {
        return $this->belongsTo(Semestre::class);
    }
    public function programme() {
        return $this->belongsTo(Programme::class);
    }
}
