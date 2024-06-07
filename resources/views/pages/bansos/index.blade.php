@extends('layouts.app')

@section('title', 'Bansos')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
    <section class="section bansos">
        <div class="section-header">
            <h1>Seleksi Bantuan Sosial</h1>
            <div class="section-header-breadcrumb">
                <!-- <div class="breadcrumb-item active"><a href="{{ route('information.create') }}" class="btn btn-primary">Tambahkan Informasi</a></div> -->
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="{{ asset('img/duid.png') }}">
                            </div>
                        </div>
                        <div class="article-details text-center">
                            <h1 class="title">Bantuan Sosial Warga Kurang Mampu</h1>
                            @can('rtrw')
                                <a href="{{ route('bansos.calculate') }}" class="btn btn-outline-secondary mt-4">Cek Kelayakan Warga</a>
                            @endcan
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

                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($bansosable as $bansos)
                        <tr>
                            <td>{{ $bansos->nik }}</td>
                            <td>{{ $bansos->name }}</td>
                            <td>{{ $bansos->phone_number }}</td>
                            <td>{{ $bansos->address_ktp }}</td>
                            @if ($bansos->status==1)
                            <td><span class="badge badge-success">Penerima</span></td>
                            @else
                            <td><span class="badge badge-warning">Dalam Pengajuan</span></td>
                            @endif
                            <td>
                                <a href="{{ route('bansos.detail', $bansos->nik) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        @endforeach
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