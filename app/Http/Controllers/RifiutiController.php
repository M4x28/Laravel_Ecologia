<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rifiuti;
use App\Models\Comuni_aderenti;
use Illuminate\Support\Facades\DB;


class RifiutiController extends Controller
{
    public function index()
    {
        // Load index view

        $comuni = Comuni_aderenti::join('COMUNI_UFF', 'COMUNI_ADERENTI.fk_comune', '=', 'COMUNI_UFF.istat')
            ->distinct()
            ->get(['COMUNI_UFF.comune']);

        return view('index', [
            'smistamento' => null,
            'comuni_aderenti' => $comuni
        ]);
    }


    public function getCestino(Request $rifiuto)
    {
        // Validate data
        $rifiuto->validate([
            'rifiutoSelezionato' => 'required',
        ]);

        $rifiutoSelezionato = strip_tags($rifiuto->input('rifiutoSelezionato'));


        $smistamento = DB::table('INTERMEDIA')
            ->join('CONTENITORI', 'INTERMEDIA.fk_contenitore', '=', 'CONTENITORI.id')
            ->join('RIFIUTI', 'INTERMEDIA.fk_rifiuto', '=', 'RIFIUTI.id')
            ->select('RIFIUTI.nome AS nome_r', 'CONTENITORI.nome AS nome_c')
            ->where('RIFIUTI.nome', $rifiutoSelezionato)
            ->get();

        if (count($smistamento) > 0) {
            return view('index', [
                'smistamento' => $smistamento
            ]);
        } else {
            return view('index', [
                'smistamento' => 'vuoto'
            ]);
        }
    }
}
