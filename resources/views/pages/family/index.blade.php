@extends('layouts.app')

@section('title', 'Warga')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Keluarga</h1>
            <div class="section-header-button">
                <a href="{{ route('family.create') }}" class="btn btn-primary" id="tambahButton">Tambah Baru</a>
            </div>
        </div>
        <div class="section-body">
            {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
            <h2 class="section-title">Informasi Data Keluarga</h2>
            <p class="section-lead">
                Melalui halaman ini kamu bisa melihat seluruh data keluarga yang ada, dan kamu bisa melakukan edit atau arsip pada data keluarga
            </p>

            @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
            @endif

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="{{ route('family.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari nama warga" name="keyword">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>NoKK</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Alamat</th>
                                        <th>Jumlah Anggota</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($families as $family)
                                    <tr>
                                        <td>{{ $family->family_id }}</td>
                                        <td>{{ $family->family_head_name }}</td>
                                        <td>{{ $family->rt }}</td>
                                        <td>{{ $family->rw }}</td>
                                        <td>{{ $family->address }}</td>
                                        <td>
                                            {{ isset($famMemberCount[$family->family_id]) ? $famMemberCount[$family->family_id] . ' Anggota' : '0 Anggota' }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('family.detail', $family->family_id) }}" id="detailButton">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                        <a class="dropdown-item" href="{{ route('family.edit', $family->family_id) }}" id="editButton">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('family.archive', $family->family_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-warning" id="archiveButton">
                                                                <i class="fas fa-trash"></i> Arsipkan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $families->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
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
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>

<script>
    document.getElementById('tambahButton').addEventListener('click', function(e) {
        e.preventDefault();
        $('#confirmModal').modal('show');
        $('#confirmButton').on('click', function() {
            window.location.href = "{{ route('family.create') }}";
        });
    });
</script>
@endpush