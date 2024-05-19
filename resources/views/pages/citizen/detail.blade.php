@extends('layouts.app')

@section('title', 'General Settings')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Warga</h1>
            <div class="section-header-button">
                <a href="{{ route('citizen.edit', $citizen->citizen_data_id) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('citizen.archive', $citizen->citizen_data_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item"></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Informasi Detail Warga</h2>
            <p class="section-lead">
                Informasi mengenai data pribadi, keluarga terkait dan kesehatan.
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lihat juga</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="#" class="nav-link active">Data Personal</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Keluarga</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Kesehatan</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Pekerjaan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Identitas Personal</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">NIK</p>
                            <p><strong>{{ $citizen->citizen_data_id }}</strong></p>
                            <p class="text-muted">Nama Lengkap</p>
                            <p><strong>{{ $citizen->name }}</strong></p>
                            <p class="text-muted">Jenis Kelamin</p>
                            <p><strong>{{ $citizen->gender }}</strong></p>
                            <p class="text-muted">Tempat tanggal lahir</p>
                            <p><strong>{{ $citizen->birth_place }}, {{ $citizen->birth_date }}</strong></p>
                            <p class="text-muted">Agama</p>
                            <p><strong>{{ $citizen->religion }}</strong></p>
                            <p class="text-muted">Status Pernikahan</p>
                            <p><strong>{{ $citizen->marital_status }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Alamat</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Alamat Domisili</p>
                            <p><strong>{{ $citizen->address_domisili }}</strong></p>
                            <p class="text-muted">Alamat KTP</p>
                            <p><strong>{{ $citizen->address_ktp }}</strong></p>
                        </div>
                    </div>
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Kontak</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Nomor Telepon</p>
                            <p><strong>{{ $citizen->phone_number }}</strong></p>
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
<script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-setting-detail.js') }}"></script>
@endpush