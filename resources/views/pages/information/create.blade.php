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
                <h1>Tambah Informasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Informasi</a></div>
                    <div class="breadcrumb-item">Tambah Informasi</div>
                </div>
            </div>
            <form action="{{ route('information.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="section-body">

                    <h2 class="section-title">Tambah Informasi</h2>
                    <p class="section-lead">Kamu bisa menambahkan data seputar informasi tentang kegiatan yang akan
                        dilaksanakan</p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Tambah Informasi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kegiatan</label>
                                        <input type="text" class="form-control" name="activity" required>
                                        <small class="text-muted">Nama kegiatan yang akan dilaksanakan</small>
                                        @error('activity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Kegiatan</label>
                                        <textarea class="form-control" data-height="150" name="desc" required></textarea>
                                        <small class="text-muted">Deskripsi seputar kegiatan</small>
                                        @error('desc')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="date" required>
                                        <small class="text-muted">Tanggal kegiatan yang akan dilaksanakan</small>
                                        @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Kegiatan</label>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <input type="time" class="form-control" class="time" name="time1" required>
                                                <small class="text-muted">Jam berapa kegiatan akan dimulai</small>
                                                @error('time1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <input type="time" class="form-control" class="time" name="time2" required>
                                                <small class="text-muted">Jam berapa kegiatan akan berakhir</small>
                                                @error('time2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Kegiatan</label>
                                        <input type="text" class="form-control" name="place" required>
                                        <small class="text-muted">Tempat kegiatan yang akan dilaksanakan</small>
                                        @error('place')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Kegiatan</label>
                                        <div class="custom-file">
                                            <input type="file" id="img" class="form-control"
                                                name="img" required>
                                        </div>
                                        <small class="text-muted" style="display: block;">Foto dokumentasi seputar kegiatan
                                            yang akan dilaksanakan</small>
                                        @error('img')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Simpan Data Informasi</h4>
                                </div>

                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Simpan Data Informasi</button>
                                    <a href="{{ route('information.index') }}" class="btn btn-danger">Batal</a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </section>
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
