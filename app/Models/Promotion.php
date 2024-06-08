<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['promotion'];

    // 
    public function recus() {
        return $this->hasMany(Recu::class);
    }
}
