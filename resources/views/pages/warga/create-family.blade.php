@extends('layouts.app')

@section('title', 'Tambah Keluarga')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <form action="{{ route('warga.family.store', Auth::user()->nik) }}" method="POST">
            @csrf
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('warga.family.register', Auth::user()->nik) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tambah Keluarga</h1>
                <div class="section-header-button">
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard')}}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('warga.family', Auth::user()->nik) }}">Detail Keluarga</a></div>
                    <div class="breadcrumb-item">Tambah Keluarga</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Tambah Baru Data Kartu Keluarga</h2>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <div id="output-status"></div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Keluarga</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-muted">NoKK</p>
                                        <input type="text" class="form-control" name="family_id"required>
                                        <p class="text-muted">Nama Kepala Keluarga</p>
                                        <input type="text" class="form-control" name="family_head_name" required>
                                        <p class="text-muted">Alamat</p>
                                        <input type="text" class="form-control" name="address" required>
                                        <p class="text-muted">RT / RW</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="rt" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">/</span>
                                            </div>
                                            <input type="text" class="form-control" name="rw" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-muted">Desa / Kelurahan</p>
                                        <input type="text" class="form-control" name="village" required>
                                        <p class="text-muted">Kecamatan</p>
                                        <input type="text" class="form-control" name="sub_district" required>
                                        <p class="text-muted">Kota / Kabupaten</p>
                                        <input type="text" class="form-control" name="city" required>
                                        <p class="text-muted">Provinsi</p>
                                        <input type="text" class="form-control" name="province" required>
                                        <p class="text-muted">Kode Pos</p>
                                        <input type="text" class="form-control" name="postal_code" required>
                                    </div>
                                </div>
                                <p><strong>Pastikan data yang anda isikan sesuai dengan data pada Kartu Keluarga (KK) anda</strong></p>
                            </div>
                            
                            <div class="card-footer text-right">
                                <button class="btn btn-secondary" type="submit">Simpan</button>
                                <button class="btn btn-danger" id="cancelButton">Batal</button>
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
                <button type="button" class="btn btn-primary" id="confirmButton">Lanjutkan</button>
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
<script>
    // Event listener for Cancel button
    document.getElementById('cancelButton').addEventListener('click', function(event) {
        event.preventDefault();
        $('#confirmationModal').modal('show');
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Redirect to family page
            window.location.href = "{{ route('warga.family', Auth::user()->nik) }}";
        });
    });
</script>
@endpush