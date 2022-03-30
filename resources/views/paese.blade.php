@extends('layouts.layout')

@section('title', $paese)

@section('body')
    class='wallpaper'
@endsection

@section('content')
    <div class="sfondo">
        <div class="d-flex justify-content-center testoComune">
            <div class="row gx-5">
                <div class="col-md-4">
                    <img src="{{ asset($info_comune[0]->logo) }}" alt="logo" height="115">
                </div>
                <div class="col-lg-8">
                    <div class="row text-black h5">COMUNE DI</div>
                    <div class="row display-2 text-success">{{ $paese }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="display-5 text-center text-success m-5">Benvenuto nel comune di {{ $paese }}</div>

    <div class="container card d-flex justify-content-center shadow-custom">
        <div class="row">
            <div class="col-md-6">
                <img class='rounded m-4' src="{{ asset($info_comune[0]->mappa) }}" alt="mappa" height="300">
            </div>
            <div class="col-md-6 text-center mt-5">
                <h2 class="text-info">Informazioni sul Comune</h2>
                <h4 class="text-black mt-4">Regione: {{ $info_comune[0]->regione }}</h4>
                <h4 class="text-black">Provincia: {{ $info_comune[0]->provincia }}</h4>
                <h4 class="text-black">Superficie: {{ $info_comune[0]->superficie }}</h4>
                <h4 class="text-black">Residenti: {{ $info_comune[0]->num_residenti }}</h4>
                <h5 class="text-black">Indirizzo Municipio: {{ $info_comune[0]->indirizzo }}</h5>
            </div>
        </div>
    </div>

    <div class="container card d-flex justify-content-center shadow-custom mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class='m-5' id='map' style='width: 500px; height: 500px; border-radius:15px;'></div>
            </div>
            <div class="col-md-6 text-center mt-5">
                <h2 class="text-warning">Informazioni sul CCR</h2>
                <h4 class="text-black mt-4">Regione: {{ $info_comune[0]->regione }}</h4>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection

@section('scripts')
    <script>
        var latInfo = '{{ $ccr[0]->lat }}';
        var lngInfo = '{{ $ccr[0]->lon }}';
        mapboxgl.accessToken = 'pk.eyJ1IjoicHJvdG9uaSIsImEiOiJja3k3M28xdjUwcHhiMnhydm5vNjdrMnFhIn0.u3_MsSqg-idnV3wx1V8LLA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [lngInfo, latInfo],
            zoom: 14
        });

        //Inserisco un Marker per la posizione selezionata
        const marker2 = new mapboxgl.Marker({
                color: 'red'
            })
            .setLngLat([lngInfo, latInfo])
            .addTo(map);
    </script>
@endsection
