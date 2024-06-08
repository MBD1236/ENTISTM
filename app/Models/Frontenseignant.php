<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontenseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'cours',
        'link_fb',
        'link_in',
        'email',
        'tel',
        'image_path',
    ];
}
