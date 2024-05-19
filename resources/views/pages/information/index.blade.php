@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content information-page">
        <section class="section">
            <div class="section-header">
                <h1>Pusat Informasi</h1>
            </div>

            <div class="section-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators"
                            data-slide-to="0"
                            class="active"></li>
                        <li data-target="#carouselExampleIndicators"
                            data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators"
                            data-slide-to="2"></li>
                    </ol>
                    <div class="card corusel-card">
                        <div class="card-body">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="container">
                                        <p class="date">Minggu ke-1 September 2024</p>
                                        <h1 class="title">Simak Kegiatan Mendatang <br>
                                            yang Ada di RW 07!</h1>
                                        <p class="desc">Kegiatan akan di perbarui berkala setiap minggunya</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <p class="date">Minggu ke-1 September 2024</p>
                                        <h1 class="title">Simak Kegiatan Mendatang <br>
                                            yang Ada di RW 07!</h1>
                                        <p class="desc">Kegiatan akan di perbarui berkala setiap minggunya</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <p class="date">Minggu ke-1 September 2024</p>
                                        <h1 class="title">Simak Kegiatan Mendatang <br>
                                            yang Ada di RW 07!</h1>
                                        <p class="desc">Kegiatan akan di perbarui berkala setiap minggunya</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/posyandu.png') }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <h1 class="title">Kunjungan Posyandu</h1>
                                <p class="date">03 September 2024</p>
                                <p class="scedule">Balai RW 07 (09.00 - 12.00)</p>
                                <a href="#"
                                    class="btn btn-secondary">Edit Kegiatan</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/posyandu.png') }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <h1 class="title">Kunjungan Posyandu</h1>
                                <p class="date">03 September 2024</p>
                                <p class="scedule">Balai RW 07 (09.00 - 12.00)</p>
                                <a href="#"
                                    class="btn btn-secondary">Edit Kegiatan</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/posyandu.png') }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <h1 class="title">Kunjungan Posyandu</h1>
                                <p class="date">03 September 2024</p>
                                <p class="scedule">Balai RW 07 (09.00 - 12.00)</p>
                                <a href="#"
                                    class="btn btn-secondary">Edit Kegiatan</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
