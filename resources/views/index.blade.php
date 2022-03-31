@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <section>
        <div class="parallax a" id="parallax">
            <h2 class="display-1 text-white" id="title1"><strong><em>{{ __('Protect nature') }}</em></strong></h2>
        </div>
        <div class="parallax b">

            <div class="d-flex justify-content-center"
                style="border-radius:40px;background-color: rgba(255, 255, 255, 0.65);">
                <form action="{{ route('index.getCestino') }}" method="POST">
                    @csrf

                    <div class="row d-flex justify-content-center m-5 p-5">
                        <div class="col-md-12">
                            <div class="text-warning display-1"><em>{{ __('Cerca un rifiuto') }}</em></div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" class="form-control form-control-lg" list="listaRifiuti"
                                    name="rifiutoSelezionato" id="inputRifiuto">
                                <datalist id="listaRifiuti"></datalist>
                                <label class="form-label" for="inputRifiuto">{{ __('Search for waste') }}</label>
                            </div>
                            <!-- Error for the validating -->
                            @error('rifiutoSelezionato')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-info btn-rounded btn-lg">{{ __('Search') }}</button>
                        </div>

                    </div>

                    @if ($smistamento !== null and $smistamento !== 'vuoto')
                        @foreach ($smistamento as $metodo)
                            <div class="d-flex justify-content-center p-5">
                                <div class="card border border-success text-center" style="width: 300px; max-height:300px;">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        @switch($metodo->nome_c)
                                            @case('carta')
                                                <img src="{{ asset('img/') }}" class="img-fluid" />
                                            @break

                                            @case('plastica')
                                                <img src="{{ asset('img/carta.jpg') }}" class="img-fluid" />
                                            @break

                                            @case('secco')
                                                <img src="{{ asset('img/') }}" class="img-fluid" />
                                            @break

                                            @case('tessile')
                                                <img src="{{ asset('img/') }}" class="img-fluid" />
                                            @break

                                            @case('umido')
                                                <img src="{{ asset('img/organico.jpg') }}" class="img-fluid" />
                                            @break

                                            @case('vetro')
                                                <img src="{{ asset('img/vetro.jpg') }}" class="img-fluid" />
                                            @break

                                            @case('lattine')
                                                <img src="{{ asset('img/plastica.jpg') }}" class="img-fluid" />
                                            @break

                                            @case('ecocentro')
                                                <img src="{{ asset('img/ccr.jpg') }}" class="img-fluid" />
                                            @break

                                            @default
                                        @endswitch
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Questo elemento va gettato nel/la:
                                            {{ $metodo->nome_c }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif ($smistamento === 'vuoto')
                        <h3 class="m-2 text-center text-danger">{{ __('Sorry we did not find any results') }}
                        </h3>
                    @endif


                </form>

            </div>
        </div>

        <div class="parallax c">
            <h2>
                <h2 class="display-1 text-black"><strong><em>{{ __('...Do it for the good of all') }}</em></strong></h2>
            </h2>
        </div>
        <div class="parallax d">
            <h2></h2>
        </div>
    </section>




@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('getRifiuti') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    var len = response.length;
                    //console.log(response);
                    $("#listaRifiuti").empty();
                    for (var i = 0; i < len; i++) {
                        $("#listaRifiuti").append("<option value='" + response[i]['nome'] + "'>" +
                            response[i]['nome'] + "</option>");
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

        window.addEventListener("scroll", function() {
            let offset = window.pageYOffset;
            document.getElementById('parallax').style.backgroundPositionY = offset * 0.9 + 'px';
        });
    </script>
@endsection
