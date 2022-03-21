@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <section>
        <div class="parallax a" id="parallax">
            <h2 class="display-1 text-white"><strong><em>{{ __('Protect nature') }}</em></strong></h2>
        </div>
        <div class="parallax b">

            <div class="d-flex justify-content-center p-5 bg-light" style="border-radius:40px;">
                <form action="{{ route('index.getCestino') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
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
                    <div class="row">
                        <div class="col-md-12">
                            @if ($smistamento !== null and $smistamento !== 'vuoto')
                                @foreach ($smistamento as $metodo)
                                    <h3 class="m-2 text-center text-success">Questo elemento va gettato nel/la:
                                        {{ $metodo->nome_c }}</h3>
                                @endforeach
                            @elseif ($smistamento === 'vuoto')
                                <h3 class="m-2 text-center text-danger">{{ __('Sorry we did not find any results') }}
                                </h3>
                            @endif
                        </div>
                    </div>

                </form>

            </div>
        </div>
        </div>
        <div class="parallax c">
            <h2>
                <h2 class="display-1 text-black"><strong><em>{{ __('...Do it for the good of all') }}</em></strong></h2>
            </h2>
        </div>
        <div class="parallax d">
            <h2>DIV 4</h2>
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
