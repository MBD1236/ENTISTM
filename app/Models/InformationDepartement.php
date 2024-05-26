<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationDepartement extends Model
{
    use HasFactory;

    protected $fillable = [
        'departement',
        'code',
        'telephone',
        'email',
        'adresse',
        'photo',
        'description',
    ];
}
