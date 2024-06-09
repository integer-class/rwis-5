@extends('layouts.app')

@section('title', 'Tambah Keluarga')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Keluarga</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('family.index') }}">Data Keluarga</a></div>
                <div class="breadcrumb-item">Tambah Keluarga</div>
            </div>
        </div>
        <form action="{{ route('family.store') }}" method="POST">
            @csrf
            <div class="section-body">

                <h2 class="section-title">Tambah keluarga</h2>
                <p class="section-lead">Kamu bisa menambahkan data keluarga dan anggota keluarga disini.</p>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Keluarga</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. KK</label>
                                            <input type="text" class="form-control" name="family_id" required>
                                            <p class="text-muted">Masukkan nomor kartu keluarga</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kepala Keluarga</label>
                                            <input type="text" class="form-control" name="family_head_name" required>
                                            <p class="text-muted">Masukkan nama kepala keluarga</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="address" required>
                                            <p class="text-muted">Masukkan alamat keluarga</p>
                                        </div>
                                        <div class="form-group">
                                            <label>RT</label>
                                            <input type="text" class="form-control" name="rt" required>
                                            <p class="text-muted">Masukkan nomor RT</p>
                                        </div>
                                        <div class="form-group">
                                            <label>RW</label>
                                            <input type="text" class="form-control" name="rw" value="4" required>
                                            <p class="text-muted">Masukkan nomor RW (Warga Asli RW adalah 4)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Desa / Kelurahan</label>
                                            <input type="text" class="form-control" name="village" required>
                                            <p class="text-muted">Masukkan nama desa atau kelurahan</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" name="sub_district" required>
                                            <p class="text-muted">Masukkan nama kecamatan</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota / Kabupaten</label>
                                            <input type="text" class="form-control" name="city" required>
                                            <p class="text-muted">Masukkan nama kota atau kabupaten</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input type="text" class="form-control" name="province" required>
                                            <p class="text-muted">Masukkan nama provinsi</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Pos</label>
                                            <input type="text" class="form-control" name="postal_code" required>
                                            <p class="text-muted">Masukkan kode pos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Anggota Keluarga</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Anggota Keluarga</label>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($citizens as $citizen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $citizen->name }}</td>
                                                <td>{{ $citizen->citizen_data_id }}</td>
                                                <td>
                                                    <input type="checkbox" name="citizens[]" value="{{ $citizen->citizen_data_id }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="float-right" id="pagination">
                                        {{ $citizens->withQueryString()->links() }}
                                    </div>
                                    <p class="text-muted">Pilih anggota keluarga yang ingin ditambahkan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Simpan Data Warga</h4>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Simpan Data Warga</button>
                        <a href="{{ route('family.index') }}" class="btn btn-danger">Batal</a>
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
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush