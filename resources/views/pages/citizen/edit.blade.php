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
        <form action="{{ route('citizen.update', $citizen->citizen_data_id) }}" method="POST">
            @csrf
            <div class="section-header">

                <div class="section-header-back">
                    <a href="{{ route('citizen.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Warga</h1>

                <div class="section-header-button">
                    <button type="submit" class="btn btn-primary" id="saveButton">Simpan</button>
                    <a href="{{ route('citizen.detail', $citizen->citizen_data_id) }}" class="btn btn-danger" id="cancelButton">Batal</a>
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
                                    <!-- <li class="nav-item"><a href="#" class="nav-link" data-target="#keluarga">Keluarga</a></li> -->
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
                                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" value="{{ $citizen->citizen_data_id }}" name="nik" required>
                                <label for="nkk" class="form-label">Nomor Kartu Keluarga</label>
                                @if ($citizen->family_id)
                                <select class="form-control" name="family_id" required>
                                    <option value="{{ $family->family_id }}">{{ $citizen->family_id }}</option>
                                    @foreach ($all_family as $fam)
                                    <option value="{{ $fam->family_id }}">{{ $fam->family_id }} - {{ $fam->family_head_name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <select class="form-control" name="family_id" required>
                                    @foreach ($all_family as $fam)
                                    <option value="{{ $fam->family_id }}">{{ $fam->family_id }} - {{ $fam->family_head_name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $citizen->name }}" name="name" required>
                                <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" value="{{ $citizen->gender }}" name="gender" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
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
                                <input type="text" class="form-control" value="{{ $citizen->address_domisili }}" name="address_domisili" required>
                                <p class="text-muted">Alamat KTP</p>
                                <input type="text" class="form-control" value="{{ $citizen->address_ktp }}" name="address_ktp" required>
                            </div>
                        </div>
                        <div class="card" id="kontak">
                            <div class="card-header">
                                <h4>Kontak</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Nomor Telepon</p>
                                <input type="text" class="form-control" value="{{ $citizen->phone_number }}" name="phone_number" required>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-5">
                        <div class="card" id="keluarga-1" style="display: none;">
                            <div class="card-header">
                                <h4>Keluarga</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Nomor Kartu Keluarga</p>
                                @if ($citizen->family_id)
                                <select class="form-control" name="family_id" required>
                                    <option value="{{ $family->family_id }}">{{ $citizen->family_id }}</option>
                                    @foreach ($all_family as $fam)
                                    <option value="{{ $fam->family_id }}">{{ $fam->family_id }} - {{ $fam->family_head_name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <select class="form-control" name="family_id" required>
                                    @foreach ($all_family as $fam)
                                    <option value="{{ $fam->family_id }}">{{ $fam->family_id }}</option>
                                    @endforeach
                                </select>
                                @endif
                                <p class="text-muted">Nama Kepala Keluarga</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->family_head_name }}" name="family_head_name" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="family_head_name" required>
                                @endif
                                <p class="text-muted">Alamat KK</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->address }}" name="address" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="address" required>
                                @endif
                                <p class="text-muted">RT</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->rt }}" name="rt" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="rt" required>
                                @endif
                                <p class="text-muted">RW</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->rw }}" name="rw" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="rw" required>
                                @endif
                            </div>
                        </div>
                        <div class="card" id="keluarga-2" style="display: none;">
                            <div class="card-body">
                                <p class="text-muted">Desa/Kelurahan</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->village }}" name="village" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="village" required>
                                @endif
                                <p class="text-muted">Kecamatan</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->sub_district }}" name="district" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="district" required>
                                @endif
                                <p class="text-muted">Kabupaten/Kota</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->city }}" name="city" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="city" required>
                                @endif
                                <p class="text-muted">Provinsi</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->province }}" name="province" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="province" required>
                                @endif
                                <p class="text-muted">Kode Pos</p>
                                @if ($citizen->family_id)
                                <input type="text" class="form-control" value="{{ $family->postal_code }}" name="postal_code" required>
                                @else
                                <input type="text" class="form-control" value="Belum terdaftar" name="postal_code" required>
                                @endif
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-5">
                        <div class="card" id="kesehatan" style="display: none;">
                            <div class="card-header">
                                <h4>Kesehatan</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Umur</p>
                                <input type="text" class="form-control" value="{{ $health->age }}" name="age" required>
                                <p class="text-muted">Golongan Darah</p>
                                <input type="text" class="form-control" value="{{ $health->blood_type }}" name="blood_type" required>
                                <p class="text-muted">Berat Badan</p>
                                <input type="text" class="form-control" value="{{ $health->weight }}" name="weight" required>
                                <p class="text-muted">Tinggi Badan</p>
                                <input type="text" class="form-control" value="{{ $health->height }}" name="height" required>
                                <p class="text-muted">Disabilitas</p>
                                <input type="text" class="form-control" value="{{ $health->disability }}" name="disability" required>
                                <p class="text-muted">Kondisi Sakit</p>
                                <input type="text" class="form-control" value="{{ $health->disease }}" name="disease" required>
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
                                <select class="form-control" name="education" value="{{ $wealth->education }}" required>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Sarjana">Sarjana</option>
                                    <option value="Magister">Magister</option>
                                    <option value="Doktor">Doktor</option>
                                </select>
                                <p class="text-muted">Pekerjaan</p>
                                <select class="form-control" name="job" value="{{ $wealth->job }}" required>
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="PNS">PNS</option>
                                    <option value="TNI">TNI</option>
                                    <option value="POLRI">Polri</option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <p class="text-muted">Rentan Penghasilan</p>
                                <select class="form-control" name="income" value="{{ $wealth->income }}" required>
                                    <option value="1">Kurang dari Rp. 1.000.000</option>
                                    <option value="2">Rp. 1.000.000 - Rp. 2.000.000</option>
                                    <option value="3">Rp. 2.000.000 - Rp. 3.000.000</option>
                                    <option value="4">Rp. 3.000.000 - Rp. 4.000.000</option>
                                    <option value="5">Rp. 4.000.000 - Rp. 5.000.000</option>
                                    <option value="6">Lebih dari Rp. 5.000.000</option>
                                </select>
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