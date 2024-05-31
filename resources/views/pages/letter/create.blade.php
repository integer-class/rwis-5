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
                <h1>Tambah Letter</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Letter</a></div>
                    <div class="breadcrumb-item">Tambah Letter</div>
                </div>
            </div>
            <form action="{{ route('letter.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="section-body">

                    <h2 class="section-title">Tambah Letter</h2>
                    <p class="section-lead">Kamu bisa menambahkan data Letter yang berisi surat</p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Tambah Letter</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" required>
                                        <small class="text-muted">Nama kamu lah</small>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="address" required></input>
                                        <small class="text-muted">Omahmu nk ndi</small>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor WA</label>
                                        <input type="text" class="form-control" name="whatsapp_number" required>
                                        <small class="text-muted">Ningali nomor WA panjenengan</small>
                                        @error('whatsapp_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File Surat</label>
                                        <div class="custom-file">
                                            <input type="file" id="file" class="form-control"
                                                name="file" required>
                                        </div>
                                        <small class="text-muted" style="display: block;">File Surat</small>
                                        @error('file')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option>Sudah Verifikasi</option>
                                            <option selected>Belum Verifikasi</option>
                                            <option>Mbuh Ilang</option>
                                        </select>
                                        <small class="text-muted">guduk status hubunganmu ndol</small>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Simpan Data Letter</h4>
                                </div>

                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Simpan Data Letter</button>
                                    <a href="{{ route('letter.index') }}" class="btn btn-danger">Batal</a>
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
