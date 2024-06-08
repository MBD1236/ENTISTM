<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleveNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'ine',
        'nom',
        'prenom',
        'telephone',
        'programme',
        'reference_id',
        'etudiant_id',
    ];

    // 
    public function reference() {
        return $this->belongsTo(Reference::class);
    }

    // 
    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }
   
}
