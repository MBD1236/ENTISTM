<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'titre',
        'image_path',
        'video_path',
        'media_type',
        'description',
        'texte',
    ];
}
