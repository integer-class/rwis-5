@extends('layouts.app')

@section('title', 'Profile Keluarga')

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
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Keluarga</h1>
            <div class="section-header-button">
                @if ($family != null)
                <a href="{{ route('warga.family.edit', Auth::user()->nik) }}" class="btn btn-primary" id="editButton">Edit</a>
                @else
                <a href="{{ route('warga.family.register', Auth::user()->nik) }}" class="btn btn-primary" id="registerButton">Tambah Data Keluarga</a>
                @endif
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Detail Keluarga</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Informasi Detail Keluarga</h2>
            <p class="section-lead">
                Informasi mengenai data keluarga beserta anggota keluarga yang terdaftar.
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            @if ($family != null)
                                <div class="col-md-6">
                                    <p class="text-muted">NoKK</p>
                                    <p><strong>{{ $family->family_id }}</strong></p>
                                    <p class="text-muted">Nama Kepala Keluarga</p>
                                    <p><strong>{{ $family->family_head_name }}</strong></p>
                                    <p class="text-muted">Alamat</p>
                                    <p><strong>{{ $family->address }}</strong></p>
                                    <p class="text-muted">RT / RW</p>
                                    <p><strong>{{ $family->rt }} / {{ $family->rw }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">Desa / Kelurahan</p>
                                    <p><strong>{{ $family->village }}</strong></p>
                                    <p class="text-muted">Kecamatan</p>
                                    <p><strong>{{ $family->sub_district }}</strong></p>
                                    <p class="text-muted">Kota / Kabupaten</p>
                                    <p><strong>{{ $family->city }}</strong></p>
                                    <p class="text-muted">Provinsi</p>
                                    <p><strong>{{ $family->province }}</strong></p>
                                    <p class="text-muted">Kode Pos</p>
                                    <p><strong>{{ $family->postal_code }}</strong></p>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <p class="text-muted">NoKK</p>
                                    <p><strong>Belum terdaftar pada keluarga manapun</strong></p>
                                    <p class="text-muted">Nama Kepala Keluarga</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                    <p class="text-muted">Alamat</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                    <p class="text-muted">RT / RW</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">Desa / Kelurahan</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                    <p class="text-muted">Kecamatan</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                    <p class="text-muted">Kota / Kabupaten</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                    <p class="text-muted">Provinsi</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                    <p class="text-muted">Kode Pos</p>
                                    <p><strong>Belum terdaftar</strong></p>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($family != null)
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Anggota Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>Jenis Pekerjaan</th>
                                    </tr>
                                    @foreach ($famMembers as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->nik }}</td>
                                        <td>{{ $member->gender}}</td>
                                        <td>{{ $member->birth_place }}</td>
                                        <td>{{ $member->birth_date }}</td>
                                        <td>{{ $member->religion }}</td>
                                        <td>{{ $member->education }}</td>
                                        <td>{{ $member->job }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
    // Event listener for Edit button
    document.getElementById('editButton').addEventListener('click', function(event) {
        event.preventDefault();
        $('#confirmationModal').modal('show');
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Redirect to edit page
            window.location.href = "{{ route('warga.family.edit', Auth::user()->nik) }}";
        });
    });

    // Event listener for Register button
    document.getElementById('registerButton').addEventListener('click', function(event) {
        event.preventDefault();
        $('#confirmationModal').modal('show');
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Redirect to register page
            window.location.href = "{{ route('warga.family.register', Auth::user()->nik) }}";
        });
    });

    // Event listener for Archive button
    document.getElementById('archiveButton').addEventListener('click', function(event) {
        event.preventDefault();
        $('#confirmationModal').modal('show');
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Submit the archive form
            document.getElementById('archiveForm').submit();
        });
    });
</script>
@endpush