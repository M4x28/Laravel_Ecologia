<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Comuni_aderenti;
use App\Models\CCR;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['btn' => ['required', 'max:14']]);
        $btn = strip_tags($request->input('btn'));

        switch ($btn) {
            case 'btnCity':

                //Extends Validator for custom validation
                $validator = Validator::make($request->all(), [
                    'ComuneSelezionato' => ['required', 'integer'],
                    'IndirizzoPaese' => 'required',
                    'CCRSelezionato' => 'required',
                    'UPMappa' => ['required', 'max:10000', 'mimes:jpeg,png,jpg']
                ]);

                //Validation Fails
                if ($validator->fails()) return redirect('home')->withErrors($validator)->withInput();

                //File
                //$img_size = $request->file('UPMappa')->getSize();
                $img_name = $request->file('UPMappa')->getClientOriginalName();
                $request->file('UPMappa')->storeAs('public/users_img/', $img_name);

                //Validation works
                $comune = new Comuni_aderenti();

                $comune->indirizzo = strip_tags($request->input('IndirizzoPaese'));
                $comune->mappa = $img_name;
                $comune->fk_ccr = strip_tags($request->input('CCRSelezionato'));
                $comune->fk_comune = strip_tags($request->input('ComuneSelezionato'));

                //INSERT
                $comune->save();

                break;
            case 'btnCCR':

                break;
            case 'btnCalendario':

                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
