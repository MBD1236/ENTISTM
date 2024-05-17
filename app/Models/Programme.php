<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme',
        'departement_id'
    ];

    public function departement() {
        return $this->belongsTo(Departement::class);
    }
    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    public function attestations() {
        return $this->hasMany(Attestation::class);
    }
}
