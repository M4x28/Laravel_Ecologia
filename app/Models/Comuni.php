<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuni extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'COMUNI_UFF';


    protected $fillable = [
        'istat',
        'comune',
        'regione',
        'provincia',
        'prefisso',
        'cod_fisco',
        'superficie',
        'num_residenti'
    ];
}
