<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttestationType extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
    ];

    public function attestations()
    {
        return $this->hasMany(Attestation::class);
    }
}
