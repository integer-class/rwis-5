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
                <a href="{{ route('citizen.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Warga</h1>
            <div class="section-header-button">
                <a href="{{ route('citizen.update', $citizen->citizen_data_id) }}" class="btn btn-primary">Simpan</a>
                <a href="{{ route('citizen.detail', $citizen->citizen_data_id) }}" class="btn btn-danger">Batal</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('citizen.index')}}">Data Warga</a></div>
                <div class="breadcrumb-item">Detail Warga</div>
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
                    <div class="card" id="lihat-juga">
                        <div class="card-header">
                            <h4>Lihat juga</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="#" class="nav-link active" data-target="#data-personal">Data Personal</a></li>
                                <li class="nav-item"><a href="#" class="nav-link" data-target="#keluarga">Keluarga</a></li>
                                <li class="nav-item"><a href="#" class="nav-link" data-target="#kesehatan">Kesehatan</a></li>
                                <li class="nav-item"><a href="#" class="nav-link" data-target="#pekerjaan">Pekerjaan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="data-personal">
                        <div class="card-header">
                            <h4>Identitas Personal</h4>
                        </div>
                        <div class="card-body">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" value="{{ $citizen->citizen_data_id }}" name="nik" required>
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $citizen->name }}" name="name" required>
                            <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" value="{{ $citizen->gender }}" name="gender" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <label for="tempat-lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="{{ $citizen->birth_place }}" name="birth_place" required>
                            <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" value="{{ $citizen->birth_date }}" name="birth_date" required>
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-control" name="religion" value="{{ $citizen->religion }}" required>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <label for="status-perkawinan" class="form-label">Status Perkawinan</label>
                            <select class="form-control" name="maritial_status" value="{{ $citizen->maritial_status }}" required>
                                <option value="Belum kawin">Belum Menikah</option>
                                <option value="Kawin">Menikah</option>
                                <option value="Cerai hidup">Cerai Hidup</option>
                                <option value="Cerai mati">Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card" id="alamat">
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
                    <div class="card" id="kontak">
                        <div class="card-header">
                            <h4>Kontak</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Nomor Telepon</p>
                            <p><strong>{{ $citizen->phone_number }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" id="keluarga-1" style="display: none;">
                        <div class="card-header">
                            <h4>Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Nomor Kartu Keluarga</p>
                            <p><strong>{{ $family->family_id }}</strong></p>
                            <p class="text-muted">Nama Kepala Keluarga</p>
                            <p><strong>{{ $family->family_head_name }}</strong></p>
                            <p class="text-muted">Alamat KK</p>
                            <p><strong>{{ $family->address }}</strong></p>
                            <p class="text-muted">RT/RW</p>
                            <p><strong>{{ $family->rt }} / {{ $family->rw }}</strong></p>
                        </div>
                    </div>
                    <div class="card" id="keluarga-2" style="display: none;">
                        <div class="card-body">
                            <p class="text-muted">Desa/Kelurahan</p>
                            <p><strong>{{ $family->village }}</strong></p>
                            <p class="text-muted">Kecamatan</p>
                            <p><strong>{{ $family->sub_district }}</strong></p>
                            <p class="text-muted">Kabupaten/Kota</p>
                            <p><strong>{{ $family->city }}</strong></p>
                            <p class="text-muted">Provinsi</p>
                            <p><strong>{{ $family->province }}</strong></p>
                            <p class="text-muted">Kode Pos</p>
                            <p><strong>{{ $family->postal_code }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" id="kesehatan" style="display: none;">
                        <div class="card-header">
                            <h4>Kesehatan</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Umur</p>
                            <p><strong>{{ $health->age }}</strong></p>
                            <p class="text-muted">Golongan Darah</p>
                            <p><strong>{{ $health->blood_type }}</strong></p>
                            <p class="text-muted">Berat Badan</p>
                            <p><strong>{{ $health->weight }}</strong></p>
                            <p class="text-muted">Tinggi Badan</p>
                            <p><strong>{{ $health->height }}</strong></p>
                            <p class="text-muted">Disabilitas</p>
                            <p><strong>{{ $health->disability }}</strong></p>
                            <p class="text-muted">Kondisi Sakit</p>
                            <p><strong>{{ $health->disease }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" id="pekerjaan" style="display: none;">
                        <div class="card-header">
                            <h4>Pekerjaan</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Pendidikan Terakhir</p>
                            <p><strong>{{ $wealth->education }}</strong></p>
                            <p class="text-muted">Pekerjaan</p>
                            <p><strong>{{ $wealth->job }}</strong></p>
                            <p class="text-muted">Rentan Penghasilan</p>
                            <p><strong>{{ $wealth->income }}</strong></p>
                            <p class="text-muted">Asset</p>
                            <p><strong>{{ $wealth->asset_id }}</strong></p>
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
<script>
    $(document).ready(function() {
        $('.nav-link').click(function(e) {
            e.preventDefault();

            $('.nav-link').removeClass('active');

            $(this).addClass('active');

            var target = $(this).data('target');

            $('.card:not(#lihat-juga)').hide();

            $(target).show();

            if (target === '#data-personal') {
                $('#data-personal, #alamat, #kontak').show();
            } else if (target === '#keluarga') {
                $('#keluarga-1, #keluarga-2').show();
            } else if (target === '#kesehatan') {
                $('#kesehatan').show();
            } else if (target === '#pekerjaan') {
                $('#pekerjaan').show();
            }

            // Move #keluarga before #data-personal when #keluarga is shown
            if (target === '#keluarga') {
                $('#keluarga-1').insertBefore('#data-personal');
                $('#keluarga-2').insertBefore('#alamat');
            }
            // Move #data-personal before #keluarga when #data-personal is shown
            else if (target === '#data-personal' && ($('#keluarga-1').is(':visible') || $('#keluarga-2').is(':visible'))) {
                $(target).insertBefore('#keluarga-1');
            }
            // Move #kesehatan before #data-personal when #kesehatan is shown
            else if (target === '#kesehatan' && $('#kesehatan').is(':visible')) {
                $(target).insertBefore('#data-personal');
            }
            // Move #pekerjaan before #data-personal when #pekerjaan is shown
            else if (target === '#pekerjaan' && $('#pekerjaan').is(':visible')) {
                $(target).insertBefore('#data-personal');
            }
        });
    });
</script>

@endpush