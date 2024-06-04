<?php

namespace App\Models;

use App\Models\Cour;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        "cour_id",
        "programme_id",
        "promotion_id",
        "niveau_id",
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
    public function cour() {
        return $this->belongsTo(Cour::class);
    }
}
