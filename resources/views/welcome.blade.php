@extends('layouts.landing')

@section('title', 'Landing Page')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}"> --}}
@endpush

@section('main')
    <div class="container container-1 section" id="home">
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
            <div class="col-md-6 mb-5">
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
                            <img src="{{ asset('img/bapakmu.jpg') }}" class="d-block corusel-img" alt="...">
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
        {{-- <div class="search-container">
        <div class="search-label d-flex justify-content-start align-items-center">
            <span class="text-uppercase font-weight-bold text-dark" style="font-size: 14px; letter-spacing: 2.8px;font-weight: bold;">
                SEARCH
            </span>
        </div>
        <div class="search-input position-relative d-flex align-items-center bg-white">
            <input type="text" class="form-control border-0 bg-transparent" placeholder="Type to search..." style="flex-grow: 1;">
            <button class="search-button d-flex justify-content-center align-items-center border-0">
                <img src="{{asset('img/search.png')}}" alt="Search Icon" class="search-icon">
            </button>
        </div>
    </div> --}}


        {{-- capsule --}}
        <div class="row mt-5 justify-content-evenly">
            <div class="col-md-4">
                <img src="{{ asset('img/citizengroup.png') }}" class="rounded-pill" alt="...">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/housegroup.png') }}" class="rounded-pill" alt="...">
            </div>
        </div>

    </div>
    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly row-sec2">
            <div class="col-md-2 text-center mt-5">
                <a href="">
                    <img src="{{ asset('img/charity.png') }}" alt="">
                </a>
                <p class="logo-title">Social Charity</p>
            </div>
            <div class="col-md-2 text-center mt-5">
                <a href="">
                    <img src="{{ asset('img/people.png') }}" alt="">
                </a>
                <p class="logo-title">Data Digitalization</p>
            </div>
            <div class="col-md-2 text-center mt-5">
                <a href="">
                    <img src="{{ asset('img/doc.png') }}" alt="">
                </a>
                <p class="logo-title">Letter and Digital Siganture</p>
            </div>
            <div class="col-md-2 text-center mt-5">
                <a href="">
                    <img src="{{ asset('img/info.png') }}" alt="">
                </a>
                <p class="logo-title">Information Hub</p>
            </div>
            <div class="col-md-2 text-center mt-5">
                <a href="">
                    <img src="{{ asset('img/brain.png') }}" alt="">
                </a>
                <p class="logo-title">Problem Report</p>
            </div>
        </div>
    </div>

    <div class="container information section" id="about">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p class="greet-information">
                    WHO ARE WE
                </p>
                <p class="title-information">
                    Connecting <br>
                    Neighborhood, <br>
                    Connecting Lives <br>
                </p>
                <p class="desc-information">
                    We are the heart of your community, committed to promoting <br>
                    harmony, progress, and well-being. Our objective is to <br>
                    empower residents, create initiatives, and build a vibrant and <br>
                    united community. We work hard to make our RW a place <br>
                    where every voice is heard, every need is answered, and every <br>
                    dream is achievable through cooperation, innovation, and <br>
                    steadfast devotion.
                </p>

                {{-- card --}}

                <a href="{{ route('information.index') }}">
                    <div class="card information-card mt-5">
                        <div class="row">
                            <div class="col-sm-2 col-md-2 mt-4 ms-4">
                                <img src="{{ asset('img/hub.png') }}" alt="" width="40px">
                            </div>
                            <div class="col-sm-8 col-md-8 ms-3">
                                <p class="card-title mt-2">
                                    Information Hub
                                </p>
                                <p class="card-text">
                                    Details on community programs,
                                    events, and initiatives, and bansos
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                {{-- <a href="">
                    <div class="card information-card mt-5">
                        <div class="row">
                            <div class="col-md-2 mt-4 ms-4">
                                <img src="{{ asset('img/citizendigital.png')}}" alt="" width="40px">
        </div>
        <div class="col-md-8">
            <p class="card-title mt-2">
                Citiezen Data Digitalization
            </p>
            <p class="card-text">
                Securely manage citizen data for <br>
                efficient communication
            </p>
        </div>
    </div>
</div>
</a> --}}
            </div>

            {{-- image --}}

            <div class="col-sm-12 col-md-6">
                <div class="row image-warga">
                    <div class="col-md-6">
                        <img src="{{ asset('img/warga1.png') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('img/warga2.png') }}" alt="">
                        <img src="{{ asset('img/warga3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- all programs --}}
    <div class="program section" id="program">
        <div class="container">
            <p class="greet-program">
                CHECKOUT OUR NEW
            </p>
            <div class="row">
                <div class="col-md-10">
                    <p class="title-program">
                        Latest Program and Activities
                    </p>
                    <p class="title-program-desc">
                        Here are our several programs and activities that you should <br>
                        keep your eyes on
                    </p>
                </div>
                <div class="col-md-1 ms-auto">
                    <button type="button" class="btn btn-outline-primary">All</button>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($top3information as $information)
                    <div class="col-md-4 card-program">
                        <div class="card"
                            style="background-image: url('{{ asset('storage/' . $information->image) }}'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <div
                                    class="card rounded-pill pt-2 ps-4 position-absolute bottom-0 start-0 mb-3 ms-3 program-pill">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{ asset('img/fire-icon.png') }}" alt="" class="mb-1">
                                        </div>
                                        <div class="col-md-9 ms-2">
                                            <p>Baru</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="title-program mt-3">
                            {{ $information->title }}
                        </p>
                        <p class="date-program">
                            {{ $information->date }}
                        </p>
                        <p class="desc-program">
                            {{ $information->time }} <br>
                            {{ $information->place }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="service section" id="service">
        <div class="container text-center">
            <p class="title">
                Our Services
            </p>
            <p class="greet">
                We Provide Ease for You
            </p>
            @auth
                <div class="row card-group">
                    <div class="col-sm-12 col-md-4">
                        @if (auth()->user()->level == 'warga')
                            <a href="">
                                <div class="card ms-5 mt-5">
                                    <div class="card-body p-5">
                                        <div class="logo rounded-circle p-4 mt-4 mb-4">
                                            <img src="{{ asset('img/search.png') }}" alt="">
                                        </div>
                                        <p class="title-card">View Citizens Data</p>
                                        <p class="desc-card">You can view detailed <br>
                                            information of citizens</p>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('citizen.index') }}">
                                <div class="card ms-5 mt-5">
                                    <div class="card-body p-5">
                                        <div class="logo rounded-circle p-4 mt-4 mb-4">
                                            <img src="{{ asset('img/search.png') }}" alt="">
                                        </div>
                                        <p class="title-card">View Citizens Data</p>
                                        <p class="desc-card">You can view detailed <br>
                                            information of citizens</p>
                                    </div>
                                </div>
                            </a>
                        @endif

                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card ms-5 mt-5">
                            <a href="">
                                <div class="card-body p-5">
                                    <div class="logo rounded-circle p-4 mt-4 mb-4">
                                        <img src="{{ asset('img/home.png') }}" alt="">
                                    </div>
                                    <p class="title-card">RT/RW Contact Info</p>
                                    <p class="desc-card">If there’s an urgent <br>
                                        neccessities with RT/RW <br>
                                        you can view their contacts <br>
                            </a>
                            here</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card ms-5 mt-5">
                        <a href="{{ route('letter.index') }}">
                            <div class="card-body p-5">
                                <div class="logo rounded-circle p-4 mt-4 mb-4">
                                    <img src="{{ asset('img/doc2.png') }}" alt="">
                                </div>
                                <p class="title-card">Sign Digitalization</p>
                                <p class="desc-card">Any kind of letters now can <br>
                                    be digital signed, make it <br>
                                    easier and effective</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="row card-group">
                <div class="col-sm-12 col-md-4">
                    <a href="{{ route('citizen.index') }}">
                        <div class="card ms-5 mt-5">
                            <div class="card-body p-5">
                                <div class="logo rounded-circle p-4 mt-4 mb-4">
                                    <img src="{{ asset('img/search.png') }}" alt="">
                                </div>
                                <p class="title-card">View Citizens Data</p>
                                <p class="desc-card">You can view detailed <br>
                                    information of citizens</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card ms-5 mt-5">
                        <a href="">
                            <div class="card-body p-5">
                                <div class="logo rounded-circle p-4 mt-4 mb-4">
                                    <img src="{{ asset('img/home.png') }}" alt="">
                                </div>
                                <p class="title-card">RT/RW Contact Info</p>
                                <p class="desc-card">If there’s an urgent <br>
                                    neccessities with RT/RW <br>
                                    you can view their contacts <br>
                                here</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card ms-5 mt-5">
                    <a href="{{ route('letter.index') }}">
                        <div class="card-body p-5">
                            <div class="logo rounded-circle p-4 mt-4 mb-4">
                                <img src="{{ asset('img/doc2.png') }}" alt="">
                            </div>
                            <p class="title-card">Sign Digitalization</p>
                            <p class="desc-card">Any kind of letters now can <br>
                                be digital signed, make it <br>
                                easier and effective</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endauth

    </div>
    </div>

    <div class="neighborhood">
        <div class="container">
            <p class="title-1">AREAS ACROSS THE RW</p>
            <p class="title-2">Neighborhood Data</p>

            <div class="row mt-2 justify-content-around">
                <div class="col-md-3 mt-5">
                    <div class="card rw">
                        <div class="card-body">
                            <div class="position-absolute bottom-0 start-0 ms-4">
                                <p class="num" id="citizenCount">{{ $citizenCount }}</p>
                                <p class="title">Citizen</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5">
                    <div class="card rt">
                        <div class="card-body">
                            <div class="position-absolute bottom-0 start-0 ms-4">
                                <p class="num" id="rtCount">{{ $rtCount }}</p>
                                <p class="title">RT</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card houses">
                        <div class="card-body">
                            <div class="position-absolute bottom-0 start-0 ms-4">
                                <p class="num" id="familyCount">{{ $familyCount }}</p>
                                <p class="title">Family</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-around">
                <div class="col-md-4 mt-5">
                    <div class="card adult">
                        <div class="card-body">
                            <div class="position-absolute bottom-0 start-0 ms-4">
                                <p class="num" id="adultCount">{{ $adultCount }}</p>
                                <p class="title">Adult</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="card kids">
                        <div class="card-body">
                            <div class="position-absolute bottom-0 start-0 ms-4">
                                <p class="num" id="childCount">{{ $childCount }}</p>
                                <p class="title">Kids < 15 years old </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="creators">
        <div class="container-fluid">
            <p class="intro">INTRODUCTION TO</p>
            <p class="title">The Creators and Developers</p>
            <div class="row image-creators justify-content-evenly ms-5">
                <div class="col-sm-8 col-md-2 mt-5">
                    <div class="card">
                        <img src="{{ asset('img/ferin.png') }}" alt="">
                    </div>
                    <p class="name">Athriya G.</p>
                    <p class="position">Front-end Developer</p>
                </div>
                <div class="col-sm-8 col-md-2 mt-5">
                    <div class="card">
                        <img src="{{ asset('img/kresna.jpg') }}" alt="">
                    </div>
                    <p class="name">Sri</p>
                    <p class="position">Project Manager</p>
                </div>
                <div class="col-sm-8 col-md-2 mt-5">
                    <div class="card">
                        <img src="{{ asset('img/me.jpeg') }}" alt="">
                    </div>
                    <p class="name">Davis</p>
                    <p class="position">Anu</p>
                </div>
                <div class="col-sm-8 col-md-2 mt-5">
                    <div class="card">
                        <img src="{{ asset('img/lenka.png') }}" alt="">
                    </div>
                    <p class="name">Lenka</p>
                    <p class="position">Front-end Developer</p>
                </div>
                <div class="col-sm-8 col-md-2 mt-5">
                    <div class="card">
                        <img src="{{ asset('img/sus.jpg') }}" alt="">
                    </div>
                    <p class="name">Sus</p>
                    <p class="position">Front-end Developer</p>
                </div>

            </div>
        </div>
    </div>

    <div class="info section" id="info">
        <br><br><br>
    </div>

    <div class="news">
        <div class="container">
            <p class="title1">WHAT’S NOW</p>
            <p class="title2">Latest Reports & News</p>
            <div class="row justify-content-around">
                <div class="col-sm-8 col-md-3">
                    <div class="card-bapak">
                        <div class="card card-date">
                            <p class="date">25</p>
                            <p class="day">Tue</p>
                        </div>
                    </div>
                    <p class="title-news">BLT Rp 900.000 Fix Cair Hari Ini</p>
                    <p class="desc">25 Maret 2024 di 4 Wilayah di Jawa Timur</p>
                </div>
                <div class="col-sm-8 col-md-3">
                    <div class="card-jalan">
                        <div class="card card-date">
                            <p class="date">25</p>
                            <p class="day">Tue</p>
                        </div>
                    </div>
                    <p class="title-news">BLT Rp 900.000 Fix Cair Hari Ini</p>
                    <p class="desc">25 Maret 2024 di 4 Wilayah di Jawa Timur</p>
                </div>
                <div class="col-sm-8 col-md-3">
                    <div class="card-sampah">
                        <div class="card card-date">
                            <p class="date">25</p>
                            <p class="day">Tue</p>
                        </div>
                    </div>
                    <p class="title-news">BLT Rp 900.000 Fix Cair Hari Ini</p>
                    <p class="desc">25 Maret 2024 di 4 Wilayah di Jawa Timur</p>
                </div>
            </div>
        </div>
    </div>


    <div class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="title1">
                        TESTIMONIALS
                    </p>
                    <p class="title2">
                        Apa Kata Mereka <br>
                        tentang SIMWARGA?
                    </p>
                    <p class="title3">
                        Yuk testimoni warga RW 07 dalam penggunaan <br>
                        SIMWARGA dalam membantu keseharian mereka.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('img/petik.png') }}" alt="">
                            <p class="desc">Penggunaan sistem informasi RW memudahkan akses informasi, meningkatkan
                                komunikasi, memperkuat partisipasi masyarakat, dan meningkatkan efisiensi penyelesaian
                                masalah lingkungan, menciptakan lingkungan yang lebih aman dan terhubung secara lebih baik
                                di tingkat komunitas.</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="pp">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <p class="name align-middle mt-2">SlametGaming635</p>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('img/star.png') }}" alt="" class="mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="becomeapart mt-5">
        <img src="{{ asset('img/becomeapart.png') }}" alt="Become a Part">
    </div>

    <div class="location p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="https://maps.app.goo.gl/JXyAs8W89nkhonZA6" target="_blank">
                        <div class="card map">

                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="mt-5">
                    <p class="desc mt-4">Pisang Kipas Street No. 7 <br>
                        RW 07 <br>
                        Malang City, Indonesia</p>
                    <p class="num"><i class="fa-solid fa-phone"></i> +62 821 4294 0921 (Abdul)</p>
                </div>
                <div class="col-md-2 mt-5 offset-md-2">
                    <p class="quick-link">Quick Links</p>
                    <a href="#home" class="menu">Home</a><br>
                    <a href="#about" class="menu">About</a><br>
                    <a href="#service" class="menu">Services</a><br>
                    <a href="#info" class="menu">Info</a><br>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.8.0/countUp.min.js"></script>
    <!-- Page Specific JS File -->
@endpush
