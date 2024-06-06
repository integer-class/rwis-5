@extends('layouts.app')

@section('title', 'Detail Warga')

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
                <a href="{{ route('bansos.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Warga</h1>
            <div class="section-header-button">
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('bansos.index')}}">Bansos</a></div>
                <div class="breadcrumb-item">Detail Warga</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Informasi Detail Warga</h2>
            <p class="section-lead">
                Informasi mengenai warga yang terdaftar pada sistem.
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Warga</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted">NIK</p>
                                    <p><strong>{{ $bansosable->nik }}</strong></p>
                                    <p class="text-muted">Nama Warga</p>
                                    <p><strong>{{ $bansosable->name }}</strong></p>
                                    <p class="text-muted">No. Telepon</p>
                                    <p><strong>{{ $bansosable->phone_number }}</strong></p>
                                    <p class="text-muted">Alamat KTP</p>
                                    <p><strong>{{ $bansosable->address_ktp }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">Status</p>
                                    @if ($bansosable->status==1)
                                    <p><span class="badge badge-success">Penerima</span></p>
                                    @else
                                    <p><span class="badge badge-warning">Dalam Pengajuan</span></p>
                                    <p class="text-muted">
                                        Sedang dalam proses pengajuan bantuan sosial. Mohon konfirmasi jika pengajuan sudah selesai.
                                    </p>
                                    <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#confirmationModal">Konfirmasi Sudah Menerima</button>
                                    @endif

                                    <!-- <p class="text-muted">Kota / Kabupaten</p>
                                    <p class="text-muted">Provinsi</p>
                                    <p class="text-muted">Kode Pos</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>


<!-- Modal Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin melanjutkan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('bansos.confirm', ['id' => $bansosable->nik]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-setting-detail.js') }}"></script>

@endpush