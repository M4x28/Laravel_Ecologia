@extends('layouts.layout')

@section('title', $paese)

@section('body')
    class='wallpaper' id='body'
@endsection

@section('content')
    <div class="sfondo">
        <div class="d-flex justify-content-center testoComune">
            <div class="row gx-5">
                <div class="col-md-4">
                    <img src="{{ asset('../storage/app/public/img_logo_comuni/' . $info_comune[0]->logo) }}" alt="logo"
                        height="115">
                </div>
                <div class="col-lg-8">
                    <div class="row text-black h5">{{ __('MUNICIPALITY OF') }}</div>
                    <div class="row display-2 text-success">{{ $paese }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="display-5 text-center text-primary m-5">{{ __('Welcome in') }} {{ $paese }}</div>

    <div class="container card d-flex justify-content-center bg-light bg-gradient shadow-custom">
        <div class="row">
            <div class="col-md-6">
                <img class='rounded m-4' src="{{ asset('../storage/app/public/img_comuni/' . $info_comune[0]->mappa) }}"
                    alt="mappa" height="300">
            </div>
            <div class="col-md-6 text-center mt-5 mb-4">
                <h2 class="text-info">{{ __('Info') }}</h2>
                <h4 class="text-black mt-4">{{ __('Region:') }} {{ $info_comune[0]->regione }}</h4>
                <h4 class="text-black">{{ __('Province:') }} {{ $info_comune[0]->provincia }}</h4>
                <h4 class="text-black">{{ __('Sourface:') }} {{ $info_comune[0]->superficie }}</h4>
                <h4 class="text-black">{{ __('Residents:') }} {{ $info_comune[0]->num_residenti }}</h4>
                <h5 class="text-black">{{ __('Town Hall Address:') }} {{ $info_comune[0]->indirizzo }}</h5>
            </div>
        </div>
    </div>

    <div class="container card d-flex justify-content-center bg-light bg-gradient shadow-custom mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class='m-5' id='map' style='width: 500px; height: 350px; border-radius:15px;'></div>
            </div>
            <div class="col-md-6 text-center mt-5">
                <h2 class="text-warning">{{ __('Information on the JRC') }}</h2>
                <h4 class="text-black mt-4">{{ __('Name:') }} {{ $ccr[0]->nome }}</h4>
                <h4 class="text-black mt-4">Email: {{ $ccr[0]->email }}</h4>
                <h4 class="text-black mt-4">{{ __('Address:') }} {{ $ccr[0]->indirizzo }}</h4>
            </div>
        </div>
        <hr>
        <div class="row text-center mt-2 mb-4">
            <h2 class="text-info">{{ __('Opening time') }}</h2>
            <h5 class="text-black m-3">{{ __('Monday-Friday:') }}
                {{ $ccr[0]->AperturaSett }}-{{ $ccr[0]->ChiusuraSett }}
            </h5>
            @if ($ccr[0]->AperturaSab != null)
                <h5 class="text-black m-3">{{ __('Saturday:') }}
                    {{ $ccr[0]->AperturaSab }}-{{ $ccr[0]->ChiusuraSab }}</h5>
            @endif
            @if ($ccr[0]->AperturaDom != null)
                <h5 class="text-black m-3">{{ __('Sunday:') }}
                    {{ $ccr[0]->AperturaDom }}-{{ $ccr[0]->ChiusuraDom }}</h5>
            @endif
        </div>
    </div>

    <div class="container card d-flex justify-content-center bg-light bg-gradient shadow-custom mt-5">
        <h2 class="text-secondary text-center mt-4">{{ __('Information on the Areas') }}</h2>

        @foreach ($zone as $zona)
            <div class="row">
                <div class="col-md-6">
                    <img class='rounded m-4' src="{{ asset('../storage/app/public/img_zone/' . $zona->img) }}" alt="zona"
                        height="350" width="520">
                </div>
                <div class="col-md-6 text-center mt-4">
                    <h4 class="text-primary">{{ __('Area:') }} {{ $zone[0]->nome }}</h4>
                    <img class='rounded m-4 mt-2'
                        src="{{ asset('../storage/app/public/img_calendari/' . $zona->calendario) }}" alt="calendario"
                        height="310" width="500">
                </div>
            </div>
            <div class="d-flex justify-content-center m-3">
                <a class="btn btn-outline-info btn-rounded btn-lg"
                    href="{{ asset('../storage/app/public/img_calendari/' . $zona->calendario) }}" role="button"
                    download="{{ $zona->calendario }}">
                    <i class="fas fa-download fa-lg"></i>
                    <strong>{{ __('Download Calendar') }}</strong>
                </a>
            </div>
            <hr>
        @endforeach
    </div>

    <div class="m-5"></div>
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

        //scroll effect
        window.addEventListener("scroll", function() {
            let offset = window.pageYOffset;
            document.getElementById('body').style.backgroundPositionY = offset * -0.3 + 'px';
        });
    </script>
@endsection
