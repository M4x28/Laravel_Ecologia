<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Comuni_aderenti;

class ComuneInfo extends Controller
{
    public function getPaese(Request $id)
    {
        $comun = Comuni_aderenti::join('COMUNI_UFF', 'COMUNI_ADERENTI.fk_comune', '=', 'COMUNI_UFF.istat')->get(['COMUNI_UFF.comune']);
        return view('paese', [
            'smistamento' => null,
            'comuni_aderenti' => $comun
        ]);
    }
}
