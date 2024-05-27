<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'titre',
        'media_path',
        'media_type',
        'description',
        'texte',
    ];
}
