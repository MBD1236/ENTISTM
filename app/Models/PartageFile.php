<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartageFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fichier',
        'service_id',
        'user_id'
    ];

    function service(){
        return $this->belongsTo(Service::class);
    }
}
