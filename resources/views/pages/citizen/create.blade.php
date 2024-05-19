@extends('layouts.app')

@section('title', 'Tambah Warga')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Warga</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Warga</a></div>
                <div class="breadcrumb-item">Tambah Warga</div>
            </div>
        </div>
        <form action="{{ route('citizen.store') }}" method="POST">
            @csrf
            <div class="section-body">

                <h2 class="section-title">Tambah warga</h2>
                <p class="section-lead">Kamu bisa menambahkan data warga mulai dari data pribadi, data kesehatan dan kekayaan.</p>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Warga</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik">
                                    <small class="text-muted">Nomor Induk Kependudukan warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name">
                                    <small class="text-muted">Nama lengkap warga sesuai KTP</small>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="gender">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    <small class="text-muted">Jenis kelamin warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="birth_place">
                                    <small class="text-muted">Tempat lahir warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control datepicker" name="birth_date">
                                    <small class="text-muted" style="display: block;">Tanggal lahir warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="religion">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    <small class="text-muted" style="display: block;">Agama warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Status Pernikahan</label>
                                    <select class="form-control" name="maritial_status">
                                        <option value="Belum kawin">Belum Menikah</option>
                                        <option value="Kawin">Menikah</option>
                                        <option value="Cerai hidup">Cerai Hidup</option>
                                        <option value="Cerai mati">Cerai Mati</option>
                                    </select>
                                    <small class="text-muted" style="display: block;">Status pernikahan warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Alamat KTP</label>
                                    <textarea class="form-control" name="address_ktp">

                                    </textarea>
                                    <small class="text-muted">Alamat sesuai KTP warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Domisili</label>
                                    <textarea class="form-control" name="address_current">

                                    </textarea>
                                    <small class="text-muted">Alamat saat ini warga</small>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card-header">
                                <h4>Data Kesehatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Umur warga dalam tahun</small>
                                </div>
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                    <small class="text-muted">Golongan darah warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Tinggi badan warga dalam cm</small>
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Berat badan warga dalam kg</small>
                                </div>
                                <div class="form-group">
                                    <label>Disabilitas</label>
                                    <select class="form-control">
                                        <option value="tidak">Tidak</option>
                                        <option value="ya">Ya</option>
                                    </select>
                                    <small class="text-muted">Apakah warga memiliki disabilitas</small>
                                </div>
                                <div class="form-group">
                                    <label>Riwayat Penyakit</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Penyakit yang dimiliki warga</small>
                                    <small class="text-muted">Pisahkan dengan koma (,)</small>
                                    <small class="text-muted">Contoh: Diabetes, Hipertensi</small>
                                    <small class="text-muted">Kosongkan jika tidak ada</small>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <!-- <div class="card">
                            <div class="card-header">
                                <h4>Data Keluarga</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomor Kartu Keluarga</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Nomor Kartu Keluarga warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Keluarga</label>
                                    <textarea class="form-control"></textarea>
                                    <small class="text-muted">Alamat sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Nomor RT sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Nomor RW sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>Desa/Kelurahan</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Desa/Kelurahan sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Kecamatan warga sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten/Kota</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Kabupaten/Kota warga sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Provinsi warga sesuai dengan Kartu Keluarga</small>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" class="form-control">
                                    <small class="text-muted">Kode Pos warga sesuai dengan Kartu Keluarga</small>
                                </div>
                            </div>
                        </div> -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pekerjaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" name="job">
                                    <small class="text-muted">Pekerjaan warga saat ini</small>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <select class="form-control" name="education">
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="sarjana">Sarjana</option>
                                        <option value="magister">Magister</option>
                                        <option value="doktor">Doktor</option>
                                    </select>
                                    <small class="text-muted">Pendidikan terakhir warga</small>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan</label>
                                    <select class="form-control" name="income">
                                        <option value="1">Kurang dari Rp. 1.000.000</option>
                                        <option value="2">Rp. 1.000.000 - Rp. 2.000.000</option>
                                        <option value="3">Rp. 2.000.000 - Rp. 3.000.000</option>
                                        <option value="4">Rp. 3.000.000 - Rp. 4.000.000</option>
                                        <option value="5">Rp. 4.000.000 - Rp. 5.000.000</option>
                                        <option value="6">Lebih dari Rp. 5.000.000</option>
                                    </select>
                                    <small class="text-muted">Rentan penghasilan warga</small>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Simpan Data Warga</h4>
                            </div>

                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Simpan Data Warga</button>
                                <a href="{{ route('citizen.index') }}" class="btn btn-danger">Batal</a>
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
<script src=" {{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>


<!-- Page Specific JS File -->

@endpush