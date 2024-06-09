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
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('citizen.index') }}">Data Warga</a></div>
                    <div class="breadcrumb-item">Tambah Warga</div>
                </div>
            </div>
            <form action="{{ route('citizen.store') }}" method="POST">
                @csrf
                <div class="section-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2 class="section-title">Tambah warga</h2>
                    <p class="section-lead">Kamu bisa menambahkan data warga mulai dari data pribadi, data kesehatan dan
                        kekayaan.</p>

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Tambah Warga</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" required>
                                        <small class="text-muted">Nomor Induk Kependudukan warga</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" required>
                                        <small class="text-muted">Nama lengkap warga sesuai KTP</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="gender" required>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                            <small class="text-muted">Jenis kelamin warga</small>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="text" class="form-control" name="phone_number" required>
                                        <small class="text-muted">Nomor warga yang dapat dihubungi</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="birth_place" required>
                                        <small class="text-muted">Tempat lahir warga</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control datepicker" name="birth_date" required>
                                        <small class="text-muted" style="display: block;">Tanggal lahir warga</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="religion" required>
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
                                        <select class="form-control" name="maritial_status" required>
                                            <option value="Belum kawin">Belum Menikah</option>
                                            <option value="Kawin">Menikah</option>
                                            <option value="Cerai hidup">Cerai Hidup</option>
                                            <option value="Cerai mati">Cerai Mati</option>
                                        </select>
                                        <small class="text-muted" style="display: block;">Status pernikahan warga</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat KTP</label>
                                        <textarea class="form-control" name="address_ktp" required>

                                    </textarea>
                                        <small class="text-muted">Alamat sesuai KTP warga</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Domisili</label>
                                        <textarea class="form-control" name="address_current" required>

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
                                        <select class="form-control" name="job" required>
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
                                        <small class="text-muted">Pekerjaan warga saat ini</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="form-control" name="education" required>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Sarjana">Sarjana</option>
                                            <option value="Magister">Magister</option>
                                            <option value="Doktor">Doktor</option>
                                        </select>
                                        <small class="text-muted">Pendidikan terakhir warga</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Penghasilan</label>
                                        <select class="form-control" name="income" required>
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
                            @can('rw')
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Penduduk</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>No RT</label>
                                            <input type="number" class="form-control" name="rt" value="0">
                                            <small class="text-muted">Nomor RT warga</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Jabatan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Pilih Jabatan</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="level" value="rt"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Ketua RT</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="level" value="warga"
                                                        class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">Warga</span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan

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
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
