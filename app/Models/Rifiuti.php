<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifiuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descrizione'
    ];
}
