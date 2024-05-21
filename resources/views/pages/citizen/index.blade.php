@extends('layouts.app')

@section('title', 'Users')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Warga</h1>
            <div class="section-header-button">
                <a href="{{ route('citizen.create') }}" class="btn btn-primary">Tambah Baru</a>
            </div>
        </div>
        <div class="section-body">
            {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
            <h2 class="section-title">Informasi Data Warga</h2>
            <p class="section-lead">
                You can manage all Users, such as editing, deleting and more.
            </p>

            @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
            @endif

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="{{ route('citizen.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari nama warga" name="keyword">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>NIK</th>
                                        <th>Nama Warga</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor Telepon</th>
                                        <th>Alamat Domisili</th>
                                        <th>Alamat KTP</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($citizens as $citizen)
                                    <tr>

                                        <td>{{ $citizen->citizen_data_id }}
                                        </td>
                                        <td>
                                            {{ $citizen->name }}
                                        </td>
                                        <td>
                                            {{ $citizen->gender }}
                                        </td>
                                        <td>
                                            {{ $citizen->phone_number }}
                                        </td>
                                        <td>
                                            {{ $citizen->address_domisili }}
                                        </td>
                                        <td>
                                            {{ $citizen->address_ktp }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- dropdown button : view, edit, archive -->
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('citizen.detail', $citizen->citizen_data_id) }}">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                        <a class="dropdown-item" href="{{ route('citizen.edit', $citizen->citizen_data_id) }}">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('citizen.archive', $citizen->citizen_data_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                <i class="fas fa-trash"></i> Archive
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                            <div class="float-right">
                                {{ $citizens->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush