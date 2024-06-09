@extends('layouts.app')

@section('title', 'Edit Keluarga')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <form action="{{ route('family.update', $family->family_id) }}" method="POST">
            @csrf
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('family.detail', $family->family_id)}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Keluarga</h1>
                <div class="section-header-button">
                    <button type="submit" class="btn btn-primary" id="saveButton">Simpan</button>
                    <a href="{{ route('family.detail', $family->family_id) }}" class="btn btn-danger" id="cancelButton">Batal</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('family.index')}}">Data Keluarga</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('family.detail', $family->family_id)}}">Detail Keluarga</a></div>
                    <div class="breadcrumb-item">Edit Keluarga</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Halaman Edit Keluarga</h2>
                <p class="section-lead">
                    Halaman ini digunakan untuk mengedit data keluarga yang terdaftar.
                </p>

                <div id="output-status"></div>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Informasi Keluarga</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="family_id" class="form-label">NoKK</label>
                                            <input type="text" class="form-control" value="{{ $family->family_id }}" name="family_id" required>
                                            <label for="head_name" class="form-label">Nama Kepala Keluarga</label>
                                            <input type="text" class="form-control" value="{{ $family->family_head_name }}" name="head_name" required>
                                            <label for="address" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" value="{{ $family->address }}" name="address" required>
                                            <label for="rt" class="form-label">RT / RW</label>
                                            <input type="text" class="form-control" value="{{ $family->rt }}" name="rt" required>
                                            <br>
                                            <input type="text" class="form-control" value="{{ $family->rw }}" name="rw" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="village" class="form-label">Desa / Kelurahan</label>
                                            <input type="text" class="form-control" value="{{ $family->village }}" name="village" required>
                                            <label for="sub_district" class="form-label">Kecamatan</label>
                                            <input type="text" class="form-control" value="{{ $family->sub_district }}" name="sub_district" required>
                                            <label for="city" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" class="form-control" value="{{ $family->city }}" name="city" required>
                                            <label for="province" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" value="{{ $family->province }}" name="province" required>
                                            <label for="postal_code" class="form-label">Kode Pos</label>
                                            <input type="text" class="form-control" value="{{ $family->postal_code }}" name="postal_code" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <th>Pilihan</th>
                                            </tr>
                                            @foreach ($famMembers as $member)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->nik}}</td>
                                                <td>
                                                    <input type="checkbox" name="citizens[]" value="{{ $member->nik }}" {{ $member->family_id == $family->family_id ? 'checked' : '' }}>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        <div class="float-right" id="pagination">
                                            {{ $famMembers->withQueryString()->links() }}
                                        </div>
                                        <p class="text-muted">Pilih anggota keluarga yang ingin ditambahkan atau dikurangi</p>
                                    </div>
                                </div>
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
    // Event listener for Edit button
    document.getElementById('editButton').addEventListener('click', function(event) {
        event.preventDefault();
        $('#confirmationModal').modal('show');
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Redirect to edit page
            window.location.href = "{{ route('family.edit', $family->family_id) }}";
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