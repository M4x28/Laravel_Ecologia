<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rifiuti;
use App\Models\CCR;
use App\Models\Comuni;


class getRifiuti extends Controller
{
    public function getRifiuti()
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
