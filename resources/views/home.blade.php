@extends('layouts.app')

@section('title', 'Profile')

@section('body')
    class='gradient-custom'
@endsection


@section('content')
    @if (session()->has('store_feedback'))
        <div class="alert alert-success">
            <h2 class="text-center">{{ __('Inserimento avvenuto con successo!') }}</h2>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-custom">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="pill" href="#ex3-pills-1"
                                    role="tab" aria-controls="ex3-pills-1" aria-selected="true">{{ __('Add City') }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="pill" href="#ex3-pills-2"
                                    role="tab" aria-controls="ex3-pills-2" aria-selected="false">{{ __('Add CCR') }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="pill" href="#ex3-pills-3"
                                    role="tab" aria-controls="ex3-pills-3" aria-selected="false">{{ __('Add Area') }}</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content" id="ex2-content">
                            <div class="tab-pane fade show active" id="ex3-pills-1" role="tabpanel"
                                aria-labelledby="ex3-tab-1">
                                <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="container mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <input type="text" class="form-control form-control-lg"
                                                        list="listaComuni" name="ComuneSelezionato" id="inputComune">
                                                    <datalist id="listaComuni"></datalist>
                                                    <label class="form-label"
                                                        for="inputComune">{{ __('City') }}</label>
                                                </div>
                                                <!-- Error for the validating -->
                                                @error('ComuneSelezionato')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <input type="text" id="form12" class="form-control form-control-lg"
                                                        name='IndirizzoPaese' />
                                                    <label class="form-label" for="form12">{{ __('Address') }}</label>
                                                </div>
                                                <!-- Error for the validating -->
                                                @error('IndirizzoPaese')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-4 m-4">
                                                <label for="formFileLg1"
                                                    class="form-label text-black">{{ __('Upload Logo') }}</label>
                                                <input class="form-control form-control-lg btn btn-danger bg-gradient"
                                                    id="formFileLg1" type="file" name='UPLogo' accept="image/png" />
                                            </div>
                                            <div class="col-md-4 m-4">
                                                <label for="formFileLg"
                                                    class="form-label text-black">{{ __('Upload Mappa') }}</label>
                                                <input class="form-control form-control-lg btn btn-secondary bg-gradient"
                                                    id="formFileLg" type="file" name='UPMappa' accept="image/*" />
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-6">
                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-primary bg-gradient btn-block btn-lg"
                                                    name="btn" value='btnCity'>{{ __('Send') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="ex3-pills-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                                <form action="{{ route('home.store') }}" method="POST">
                                    @csrf

                                    <div class="row d-flex justify-content-center mt-4">
                                        <h3 class="mb-5 text-center text-info">{{ __('Info CCR') }}</h3>
                                        <div class="col-md-5">
                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form4Example1" class="form-control form-control-lg"
                                                    name='CCRName' />
                                                <label class="form-label"
                                                    for="form4Example1">{{ __('Name') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="form4Example2" class="form-control form-control-lg"
                                                    name='CCREmail' />
                                                <label class="form-label"
                                                    for="form4Example2">{{ __('Email Address') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row d-flex justify-content-center mt-2">
                                        <h3 class="mb-3 text-center text-warning">{{ __('Georeferencing') }}</h3>
                                        <div class="col-md-5 d-flex justify-content-center mb-4">
                                            <div id="map" style='width: 400px; height: 300px; border-radius:15px;'></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row m-3">
                                                <label class="form-label" for="">{{ __('Address') }}</label>
                                                <input type="text" id="indirizzoStruttura" class="form-control"
                                                    name='CCRaddress' value='' />
                                            </div>
                                            <div class="row m-3">
                                                <label class="form-label" for="">{{ __('Lon') }}</label>
                                                <input type="text" id="lon" class="form-control" name='CCRLon' value=''
                                                    readonly />
                                            </div>
                                            <div class="row m-3">
                                                <label class="form-label"
                                                    for="form3Example3">{{ __('Lat') }}</label>
                                                <input type="text" id="lat" class="form-control" name='CCRLat' value=''
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row d-flex justify-content-center m-5">
                                        <div class="col-md-6">
                                            <div class="form-outline">
                                                <input type="text" class="form-control form-control-lg"
                                                    list="listaComuniAderenti" name="ComuneAderenteSelezionato"
                                                    id="inputComuniAderenti">
                                                <datalist id="listaComuniAderenti"></datalist>
                                                <label class="form-label"
                                                    for="inputComuniAderenti">{{ __('Municipality of belonging') }}</label>
                                            </div>
                                            <!-- Error for the validating -->
                                            @error('ComuneAderenteSelezionato')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <h3 class="mb-3 text-center text-secondary">{{ __('Timetables') }}</h3>
                                        <!-- Lunedì -->
                                        <div class="row d-flex justify-content-center m-2">
                                            <div class="col-md-2 text-center">{{ __('Monday-Friday') }}</div>
                                            <div class="col-md-2">
                                                <div class="form-outline">
                                                    <input type="time" id="form12" class="form-control"
                                                        name='AperturaSett' />
                                                    <label class="form-label" for="form12">{{ __('Opening') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-outline">
                                                    <input type="time" id="form13" class="form-control"
                                                        name='ChiusuraSett' />
                                                    <label class="form-label" for="form13">{{ __('Closing') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Sabato -->
                                        <div class="row d-flex justify-content-center m-2">
                                            <div class="col-md-2 text-center">{{ __('Saturday') }}</div>
                                            <div class="col-md-2">
                                                <div class="form-outline">
                                                    <input type="time" id="form12" class="form-control"
                                                        name='AperturaSab' />
                                                    <label class="form-label" for="form12">{{ __('Open') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-outline">
                                                    <input type="time" id="form13" class="form-control"
                                                        name='ChiusuraSab' />
                                                    <label class="form-label" for="form13">{{ __('Closing') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Domenica -->
                                        <div class="row d-flex justify-content-center m-2 mb-4">
                                            <div class="col-md-2 text-center">{{ __('Sunday') }}</div>
                                            <div class="col-md-2">
                                                <div class="form-outline">
                                                    <input type="time" id="form12" class="form-control"
                                                        name='AperturaDom' />
                                                    <label class="form-label" for="form12">{{ __('Open') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-outline">
                                                    <input type="time" id="form13" class="form-control"
                                                        name='ChiusuraDom' />
                                                    <label class="form-label" for="form13">{{ __('Closing') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-center">
                                        <div class="col-md-6">
                                            <!-- Submit button -->
                                            <button type="submit" class="btn btn-primary bg-gradient btn-block btn-lg mb-4"
                                                name="btn" value="btnCCR">{{ __('Send') }}</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="ex3-pills-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                                <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row d-flex justify-content-center mt-4">
                                        <h3 class="mb-5 text-center text-info">{{ __('Info Area') }}</h3>
                                        <div class="col-md-5">
                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form4Example1" class="form-control form-control-lg"
                                                    name='AreaName' />
                                                <label class="form-label" for="form4Example1">{{ __('Nome') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-outline">
                                                <input type="text" class="form-control form-control-lg"
                                                    list="listaComuniAderenti" name="ComuneAderenteAreaSelezionato"
                                                    id="inputComuniAderenti">
                                                <datalist id="listaComuniAderenti"></datalist>
                                                <label class="form-label"
                                                    for="inputComuniAderenti">{{ __('Municipality of belonging') }}</label>
                                            </div>
                                            <!-- Error for the validating -->
                                            @error('ComuneAderenteSelezionato')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-4 m-4">
                                            <label for="formFileLg"
                                                class="form-label text-black">{{ __('Upload Zone') }}</label>
                                            <input class="form-control form-control-lg btn btn-info bg-gradient"
                                                id="formFileLg" type="file" name='UPZone' accept="image/*" />
                                        </div>
                                        <div class="col-md-4 m-4">
                                            <label for="formFileLg"
                                                class="form-label text-black">{{ __('Upload Calendar') }}</label>
                                            <input class="form-control form-control-lg btn btn-warning bg-gradient"
                                                id="formFileLg" type="file" name='UPCalendar' />
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-center mt-4">
                                        <div class="col-md-6">
                                            <!-- Submit button -->
                                            <button type="submit" class="btn btn-primary bg-gradient btn-block btn-lg"
                                                name="btn" value="btnCalendario">{{ __('Send') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoicHJvdG9uaSIsImEiOiJja3k3M28xdjUwcHhiMnhydm5vNjdrMnFhIn0.u3_MsSqg-idnV3wx1V8LLA';
        const map = new mapboxgl.Map({
            container: 'map', // Container ID
            style: 'mapbox://styles/mapbox/streets-v11', // Map style to use
            center: [12.49310919992692, 41.89016148276778], // Starting position [lng, lat]
            zoom: 13 // Starting zoom level
        });


        map.on('style.load', function() {

            map.on('click', function(e) {
                var coordinates = e.lngLat;

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML("<h6 class='text-black'>Posizione selezionata: </h6><br/>" + coordinates)
                    .addTo(map);

                console.log(coordinates);

                $("#lon").val(coordinates['lng']);
                $("#lat").val(coordinates['lat']);
                $("#lon").attr("value", coordinates[0]);
                $("#lat").attr("value", coordinates[1]);
            });
        });


        const geocoder = new MapboxGeocoder({
            // Initialize the geocoder
            accessToken: mapboxgl.accessToken, // Set the access token
            mapboxgl: mapboxgl, // Set the mapbox-gl instance
            marker: false, // Do not use the default marker style
            placeholder: 'Search for places', // Placeholder text for the search bar
        });

        // Add the geocoder to the map
        map.addControl(geocoder);

        // After the map style has loaded on the page,
        // add a source layer and default styling for a single point
        map.on('load', () => {
            map.addSource('single-point', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': []
                }
            });

            map.addLayer({
                'id': 'point',
                'source': 'single-point',
                'type': 'circle',
                'paint': {
                    'circle-radius': 10,
                    'circle-color': '#448ee4'
                }
            });

            // Listen for the `result` event from the Geocoder // `result` event is triggered when a user makes a selection
            //  Add a marker at the result's coordinates
            geocoder.on('result', (event) => {
                map.getSource('single-point').setData(event.result.geometry);
                //console.log(event.result);
                var coordinates = event.result.geometry.coordinates;

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML("<h6 class='text-black'>Posizione selezionata: </h6><br/>" + coordinates)
                    .addTo(map);

                // Set variable
                //console.log(coordinates[0]);
                //console.log(coordinates[1]);

                $("#lon").val(coordinates[0]);
                $("#lat").val(coordinates[1]);
                $("#lon").attr("value", coordinates[0]);
                $("#lat").attr("value", coordinates[1]);

                //$("#paeseStruttura").val(event.result.context[1].text);
                $("#indirizzoStruttura").val(event.result.place_name);
                $("#indirizzoStruttura").attr("value", event.result.place_name);
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: "{{ route('getComuniAderenti') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    var len = response.length;
                    //console.log(response);
                    $("#listaComuniAderenti").empty();
                    for (var i = 0; i < len; i++) {
                        $("#listaComuniAderenti").append("<option value='" + response[i]['id'] + "'>" +
                            response[i]['comune'] + "</option>");
                    }
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }
            });
            $.ajax({
                url: "{{ route('getComuni') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    var len = response.length;
                    //console.log(response);
                    $("#listaComuni").empty();
                    for (var i = 0; i < len; i++) {
                        $("#listaComuni").append("<option value='" + response[i]['istat'] + "'>" +
                            response[i]['comune'] + "</option>");
                    }
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }
            });
        });
    </script>
@endsection
