<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCR extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'email',
        'indirizzo',
        'lon',
        'lat'
    ];
}
