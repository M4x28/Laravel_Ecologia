<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuni_aderenti extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'COMUNI_ADERENTI';

    protected $fillable = [
        'indirizzo',
        'mappa',
        'logo',
        'fk_comune'
    ];
}
