<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rifiuti;

class getRifiuti extends Controller
{
    public function getRifiuti()
    {
        $rifiuti = Rifiuti::all();

        return response()->json($rifiuti);
    }
}
