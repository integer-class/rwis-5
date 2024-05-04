@extends('layouts.landing')

@section('title', 'Login CBT')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}"> --}}
@endpush

@section('main')
    <div class="section-1">
        <div class="container container-1">
            <div class="row">
                {{-- title --}}
                <div class="col-md-6">
                    <p class="text-start title">
                        RW 2 - INFORMATION SYSTEM <br>
                        PISANG KIPAS STEET NO. 7, MALANG CITY, INDONESIA
                    </p>
                    <p class="text-start title-2">
                        Navigate RW Life <br>
                        with Ease
                    </p>
                    <p class="text-start desc">
                        From grassroots initiatives to seamless communication, <br>
                        we're here to elevate your neighborhood experience with <br>
                        SIMWARGA we want #RVVolution
                    </p>
                </div>
                {{-- corusel img --}}
                <div class="col-md-6">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/village.png') }}" class="d-block corusel-img" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/ona.jpeg') }}" class="d-block corusel-img" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/me.jpeg') }}" class="d-block corusel-img" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
            {{-- search --}}
            <div class="input-group mt-5">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
              </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
