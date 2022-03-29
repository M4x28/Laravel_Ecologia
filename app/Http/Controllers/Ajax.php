<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rifiuti;
use App\Models\CCR;
use App\Models\Comuni;
use App\Models\Comuni_aderenti;

class Ajax extends Controller
{

    public function get_rifiuti()
    {
        $rifiuti = Rifiuti::all();
        return response()->json($rifiuti);
    }


    public function getCCR()
    {
        $ccr = CCR::all();
        return response()->json($ccr);
    }


    public function getComuni()
    {
        $comuni = Comuni::all();
        return response()->json($comuni);
    }

    public function getComuniAderenti()
    {
        $comuni = Comuni_aderenti::join('COMUNI_UFF', 'COMUNI_ADERENTI.fk_comune', '=', 'COMUNI_UFF.istat')
            ->get(['COMUNI_ADERENTI.id', 'COMUNI_UFF.comune']);

        return response()->json($comuni);
    }
}
