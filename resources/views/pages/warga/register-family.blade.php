<?php
// Example of checking before accessing 'family_id'
if (!empty($family) && isset($family[0]['family_id'])) {
    // Safe to access 'family_id'
    $familyId = $family[0]['family_id'];
}
?>

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
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('warga.family', Auth::user()->nik) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data Keluarga</h1>
            <div class="section-header-button">
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('warga.family', Auth::user()->nik) }}">Detail Keluarga</a></div>
                <div class="breadcrumb-item">Tambah Keluarga</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah & Daftarkan Data Kartu Keluarga</h2>
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
                            <h4>Informasi Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Masukkan nomor Kartu Keluarga (KK) untuk melihat informasi keluarga jika tersedia.</strong></p>
                                    <form method="GET" action="{{ route('warga.family.register', Auth::user()->nik) }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Nomor Kartu Keluarga" name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @if (!$family==null)
                            <form action="{{ route('warga.family.assign', Auth::user()->nik) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <!-- alert data ditemukan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="family_id">NoKK</label>
                                            <input type="text" class="form-control" name="family_id" value="{{ $family[0]['family_id'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="family_head_name">Nama Kepala Keluarga</label>
                                            <input type="text" class="form-control" name="family_head_name" value="{{ $family[0]['family_head_name'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Alamat</label>
                                            <input type="text" class="form-control" name="address" value="{{ $family[0]['address'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="rt">RT</label>
                                            <input type="text" class="form-control" name="rt" value="{{ $family[0]['rt'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="rw">RW</label>
                                            <input type="text" class="form-control" name="rw" value="{{ $family[0]['rw'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="village">Desa / Kelurahan</label>
                                            <input type="text" class="form-control" name="village" value="{{ $family[0]['village'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="sub_district">Kecamatan</label>
                                            <input type="text" class="form-control" name="sub_district" value="{{ $family[0]['sub_district'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">Kota / Kabupaten</label>
                                            <input type="text" class="form-control" name="city" value="{{ $family[0]['city'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Provinsi</label>
                                            <input type="text" class="form-control" name="province" value="{{ $family[0]['province'] }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code">Kode Pos</label>
                                            <input type="text" class="form-control" name="postal_code" value="{{ $family[0]['postal_code'] }}" readonly>
                                        </div>
                                    </div>
                                    <p><strong>Periksa kembali data keluarga yang akan didaftarkan. Sebelum melakukan simpan.</strong></p>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-secondary" type="submit">Simpan</button>
                                    <button class="btn btn-danger" id="cancelButton">Batal</button>
                                </div>
                            </form>
                            @else
                            <p><strong>Jika data tidak ditemukan, silahkan menambahkan data secara mandiri melalui</strong></p>
                            <br>
                            <a href="{{ route('warga.family.create', Auth::user()->nik) }}" class="btn btn-primary">Formulir Pendaftaran Keluarga</a>
                            @endif
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