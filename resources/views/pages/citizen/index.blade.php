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
                <h1>Data Warga</h1>
                @can('rtrw')
                    <div class="section-header-button">
                        <a href="{{ route('citizen.create') }}" class="btn btn-primary" id="tambahButton">Tambah Baru</a>
                    </div>
                @endcan

            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
                <h2 class="section-title">Informasi Data Warga</h2>
                <p class="section-lead">
                    Melalui halaman ini kamu bisa melihat seluruh data warga yang ada, dan kamu bisa melakukan edit atau
                    arsip pada data warga
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
                                    <form method="GET" action="{{ route('citizen.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari nama warga"
                                                name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                @can('rw')
                                    <div class="table-responsive">
                                        <table class="table-striped table">
                                            <tr>

                                                <th>NIK</th>
                                                <th>Nama Warga</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nomor Telepon</th>
                                                <th>Alamat Domisili</th>
                                                <th>Alamat KTP</th>
                                                <th>Nomor RT</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach ($citizens as $citizen)
                                                <tr>

                                                    <td>{{ $citizen->nik }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->name }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->gender }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->phone_number }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->address_domisili }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->address_ktp }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->no_rt }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->level }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="dropdown d-inline">
                                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('citizen.detail', $citizen->nik) }}"
                                                                        id="detailButton">
                                                                        <i class="fas fa-eye"></i> Lihat
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('citizen.edit', $citizen->nik) }}"
                                                                        id="editButton">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <form
                                                                        action="{{ route('citizen.archive', $citizen->nik) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-warning"
                                                                            id="archiveButton">
                                                                            <i class="fas fa-trash"></i> Arsipkan
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="float-right">
                                        {{ $citizens->withQueryString()->links() }}
                                    </div>
                                @endcan

                                @can('rt')
                                    <div class="table-responsive">
                                        <table class="table-striped table">
                                            <tr>

                                                <th>NIK</th>
                                                <th>Nama Warga</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nomor Telepon</th>
                                                <th>Alamat Domisili</th>
                                                <th>Alamat KTP</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach ($citizensRT as $citizen)
                                                <tr>

                                                    <td>{{ $citizen->nik }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->name }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->gender }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->phone_number }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->address_domisili }}
                                                    </td>
                                                    <td>
                                                        {{ $citizen->address_ktp }}
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="dropdown d-inline">
                                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('citizen.detail', $citizen->nik) }}"
                                                                        id="detailButton">
                                                                        <i class="fas fa-eye"></i> Lihat
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('citizen.edit', $citizen->nik) }}"
                                                                        id="editButton">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <form
                                                                        action="{{ route('citizen.archive', $citizen->nik) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-warning"
                                                                            id="archiveButton">
                                                                            <i class="fas fa-trash"></i> Arsipkan
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="float-right">
                                        {{ $citizensRT->withQueryString()->links() }}
                                    </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
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
    </div> --}}
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    {{-- <script>
        document.getElementById('archiveButton').addEventListener('click', function(e) {
            e.preventDefault();
            $('#confirmModal').modal('show');
            $('#confirmButton').on('click', function() {
                window.location.href = "{{ route('citizen.create') }}";
            });
        }); --}}
    </script>
@endpush
