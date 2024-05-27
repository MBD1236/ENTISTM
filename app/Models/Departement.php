<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = ['departement'];

    public function programmes() {
        return $this->hasMany(Programme::class);
    }

    public function enseignants() {
        return $this->hasMany(Enseignant::class);
    }

}
