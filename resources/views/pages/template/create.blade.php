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
                <h1>Tambah Template Surat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Template Surat</a></div>
                    <div class="breadcrumb-item">Tambah Template Surat</div>
                </div>
            </div>
            <form action="{{ route('template.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="section-body">

                    <h2 class="section-title">Tambah Template Surat</h2>
                    <p class="section-lead">Kamu bisa menambahkan data template surat</p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Tambah Template Surat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama File</label>
                                        <input type="text" class="form-control" name="name" required>
                                        <small class="text-muted">Nama file yang akan diupload</small>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File Template Surat</label>
                                        <div class="custom-file">
                                            <input type="file" id="file" class="form-control"
                                                name="file" required>
                                        </div>
                                        <small class="text-muted" style="display: block;">File Surat</small>
                                        @error('file')
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
