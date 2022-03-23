<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuni_aderenti extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'indirizzo',
        'mappa',
        'fk_ccr',
        'fk_zona'
    ];
}
