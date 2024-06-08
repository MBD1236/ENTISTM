<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontservice extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomservice',
        'email',
        'tel',
        'texte',
        'image_path',
    ];
}
