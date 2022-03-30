<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Comuni_aderenti;
use App\Models\CCR;
use App\Models\Zone;

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
                //File required, max 10000kb, only jpeg,jpg,png file
                $validator = Validator::make($request->all(), [
                    'ComuneSelezionato' => ['required', 'integer'],
                    'IndirizzoPaese' => 'required',
                    'UPMappa' => ['required', 'max:10000', 'mimes:jpeg,jpg,png']
                ]);

                //Validation Fails
                if ($validator->fails()) return redirect('home')->withErrors($validator)->withInput();

                //Validate Data
                $data = $validator->validate();

                //------ IF Validation works -------

                //File
                //$img_size = $request->file('UPMappa')->getSize();
                //$img_name = $request->file('UPMappa')->getClientOriginalName();

                //Store in storage>app>public>img_comuni with UUID
                $uuid = Str::uuid()->toString();
                $img_name = $uuid . '.' . $request->file('UPMappa')->getClientOriginalExtension();
                $request->file('UPMappa')->storeAs('public/img_comuni/', $img_name);

                $comune = new Comuni_aderenti();

                $comune->indirizzo = strip_tags($data['IndirizzoPaese']);
                $comune->mappa = $img_name;
                $comune->fk_comune = strip_tags($data['ComuneSelezionato']);

                //INSERT
                $comune->save();

                return redirect()->back()->with('store_feedback', '1');

                break;
            case 'btnCCR':

                $validator = Validator::make($request->all(), [
                    'CCRName' => ['required', 'max:80'],
                    'CCREmail' => ['required', 'email:rfc,dns'],
                    'CCRaddress' => ['required', 'max:255'],
                    'CCRLon' => ['required', 'numeric'],
                    'CCRLat' => ['required', 'numeric'],
                    'ComuneAderenteSelezionato' => 'required',
                    'AperturaSett' => ['required', 'date_format:H:i'],
                    'ChiusuraSett' => ['required', 'date_format:H:i'],
                    'AperturaSab' => ['required', 'date_format:H:i'],
                    'ChiusuraSab' => ['required', 'date_format:H:i'],
                    'AperturaDom' => ['required', 'date_format:H:i'],
                    'ChiusuraDom' => ['required', 'date_format:H:i']
                ]);

                //Validation Fails
                if ($validator->fails()) return redirect('home')->withErrors($validator)->withInput();

                //Validate Data
                $data = $validator->validate();


                $ccr = new CCR();

                $ccr->nome = strip_tags($data['CCRName']);
                $ccr->email = strip_tags($data['CCREmail']);
                $ccr->indirizzo = strip_tags($data['CCRaddress']);
                $ccr->lon = strip_tags($data['CCRLon']);
                $ccr->lat = strip_tags($data['CCRLat']);
                $ccr->fk_comune = strip_tags($data['ComuneAderenteSelezionato']);
                $ccr->AperturaSett = strip_tags($data['AperturaSett']);
                $ccr->ChiusuraSett = strip_tags($data['ChiusuraSett']);
                $ccr->AperturaSab = strip_tags($data['AperturaSab']);
                $ccr->ChiusuraSab = strip_tags($data['ChiusuraSab']);
                $ccr->AperturaDom = strip_tags($data['AperturaDom']);
                $ccr->ChiusuraDom = strip_tags($data['ChiusuraDom']);

                //INSERT
                $ccr->save();

                return redirect()->back()->with('store_feedback', '1');

                break;
            case 'btnCalendario':

                $validator = Validator::make($request->all(), [
                    'AreaName' => ['required', 'max:50'],
                    'ComuneAderenteAreaSelezionato' => ['required', 'numeric'],
                    'UPZone' => ['required', 'max:10000', 'mimes:jpeg,jpg,png'],
                    'UPCalendar' => ['required', 'max:20000', 'mimes:jpeg,jpg,png,pdf,doc,docx,xls,xlsx']
                ]);

                //Validation Fails
                if ($validator->fails()) return redirect('home')->withErrors($validator)->withInput();

                //Validate Data
                $data = $validator->validate();

                //------ IF Validation works -------

                // -- File -- 
                //Store in storage>app>public>img_calendari with UUID
                $uuid1 = Str::uuid()->toString();
                $img_name_calendario = $uuid1 . '.' . $request->file('UPCalendar')->getClientOriginalExtension();
                $request->file('UPCalendar')->storeAs('public/img_calendari/', $img_name_calendario);
                //Store in storage>app>public>img_zone with UUID
                $uuid2 = Str::uuid()->toString();
                $img_name_zona = $uuid2 . '.' . $request->file('UPZone')->getClientOriginalExtension();
                $request->file('UPZone')->storeAs('public/img_zone/', $img_name_zona);

                $zone = new Zone();

                $zone->nome = strip_tags($data['AreaName']);
                $zone->calendario = $img_name_calendario;
                $zone->img = $img_name_zona;
                $zone->fk_comune = strip_tags($data['ComuneAderenteAreaSelezionato']);

                //INSERT
                $zone->save();

                return redirect()->back()->with('store_feedback', '1');

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
