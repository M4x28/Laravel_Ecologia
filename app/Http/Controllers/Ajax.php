<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rifiuti;
use App\Models\CCR;
use App\Models\Comuni;

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
}
