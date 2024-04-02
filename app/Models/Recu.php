<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recu extends Model
{
    use HasFactory;


    protected $fillable = [
        'numrecu',
        'date',
        'serie',
        'somme',
        'modereglement'

    ];

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
}
