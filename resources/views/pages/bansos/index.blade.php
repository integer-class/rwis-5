@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section bansos">
            <div class="section-header">
                <h1>Informasi Penerimaan Bantuan Sosial</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#" class="btn btn-primary">Tambahkan Informasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/duid.png') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Bantuan Tunai Langsung</h1>
                                <a href="" class="clasify">Cek Klasifikasi</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit Kegiatan</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/beras.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Bantuan Pangan Non Tunai</h1>
                                <a href="" class="clasify">Cek Klasifikasi</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit Kegiatan</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/kartu.png') }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">Program Keluarga Harapan</h1>
                                <a href="" class="clasify">Cek Klasifikasi</a> <br>
                                <a href="#"
                                    class="btn btn-outline-secondary mt-4">Edit Kegiatan</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h1 class="title-table mb-4">Data Penerimaan Bantuan Sosial</h1>
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <tr>
        
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>RT</th>
                                <th>Tipe Kriteria</th>
                                <th>NIK</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            {{-- @foreach ($citizens as $citizen) --}}
                                <tr>
        
                                    <td>anu
                                    </td>
                                    <td>
                                        anu
                                    </td>
                                    <td>
                                       anu
                                    </td>
                                    <td>
                                        anu
                                    </td>
                                    <td>
                                        anu
                                    </td>
                                    <td><span class="badge badge-success">Sudah Verifikasi</span></td>
                                    <td>
                                        <a href='{{-- {{ route('user.edit', $citizens->nik) }} --}}'
                                            class="btn btn-info btn-icon">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
        
        
                        </table>
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
