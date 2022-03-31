<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuni_aderenti;
use App\Models\CCR;
use App\Models\Zone;

class ComuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $comune
     * @return \Illuminate\Http\Response
     */
    public function show($comune)
    {
        $comune = strip_tags($comune);

        $comuni_aderenti = Comuni_aderenti::join('COMUNI_UFF', 'COMUNI_ADERENTI.fk_comune', '=', 'COMUNI_UFF.istat')
            ->get(['COMUNI_UFF.comune']);

        $info_comune = Comuni_aderenti::join('COMUNI_UFF', 'COMUNI_ADERENTI.fk_comune', '=', 'COMUNI_UFF.istat')
            ->where('COMUNI_UFF.comune', $comune)
            ->get();

        $ccr = CCR::join('COMUNI_ADERENTI', 'CCR.fk_comune', '=', 'COMUNI_ADERENTI.id')
            ->where('COMUNI_ADERENTI.id', $info_comune[0]->id)
            ->get();

        $zone = Zone::join('COMUNI_ADERENTI', 'ZONE.fk_comune', '=', 'COMUNI_ADERENTI.id')
            ->where('COMUNI_ADERENTI.id', $info_comune[0]->id)
            ->get();

        //return $zone;
        return view('paese', [
            'paese' => $comune,
            'info_comune' => $info_comune,
            'comuni_aderenti' => $comuni_aderenti,
            'ccr' => $ccr,
            'zone' => $zone
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
