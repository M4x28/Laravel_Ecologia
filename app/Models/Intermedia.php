<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intermedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fk_rifiuto',
        'fk_contenitore'
    ];
}
