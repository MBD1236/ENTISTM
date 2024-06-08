<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontProgramme extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'intitule_programme',
        'type_programme',
        'description',
        'duree',
        'image_path',
    ];
}
