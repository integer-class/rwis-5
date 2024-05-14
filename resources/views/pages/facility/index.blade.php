@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section facility">
            <div class="section-header">
                <h1>Fasilitas RW 07</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/balairw.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Balai RW</h1>
                                <a href="" class="detail">detail</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/musholla.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Musholla Jabbanur</h1>
                                <a href="" class="detail">detail</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/poskampling.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Pos Kampling</h1>
                                <a href="" class="detail">detail</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit</a>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/lapangan.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Lapangan Serbaguna</h1>
                                <a href="" class="detail">detail</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/tpa.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Tempat Pembuangan Sampah</h1>
                                <a href="" class="detail">detail</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/posyandu3.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Posyandu</h1>
                                <a href="" class="detail">detail</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit</a>
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
