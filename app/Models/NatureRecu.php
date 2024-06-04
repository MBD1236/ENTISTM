<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureRecu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature',
    ];

    // 
    public function recus() {
        return $this->hasMany(Recu::class);
    }
}
