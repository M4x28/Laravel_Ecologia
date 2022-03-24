@extends('layouts.app')

@section('title', 'Profile')

@section('body')
    class='gradient-custom'
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
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
                                    role="tab" aria-controls="ex3-pills-3"
                                    aria-selected="false">{{ __('Add Calendar') }}</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content" id="ex2-content">
                            <div class="tab-pane fade show active" id="ex3-pills-1" role="tabpanel"
                                aria-labelledby="ex3-tab-1">
                                Tab 1 content
                            </div>
                            <div class="tab-pane fade" id="ex3-pills-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form4Example1" class="form-control" />
                                                <label class="form-label" for="form4Example1">Nome</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="form4Example2" class="form-control" />
                                                <label class="form-label" for="form4Example2">Email address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="col-md-6">
                                            <!-- Submit button -->
                                            <button type="submit"
                                                class="btn btn-primary bg-gradient btn-block btn-lg mb-4">Send</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="ex3-pills-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                                Tab 3 content
                            </div>
                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
