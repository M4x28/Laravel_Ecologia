<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCR extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CCR';


    protected $fillable = [
        'nome',
        'email',
        'indirizzo',
        'lon',
        'lat',
        'fk_comune',
        'AperturaSett',
        'ChiusuraSett',
        'AperturaSab',
        'ChiusuraSab',
        'AperturaDom',
        'ChiusuraDom'
    ];
}
