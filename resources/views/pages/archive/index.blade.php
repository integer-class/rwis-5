@extends('layouts.app')

@section('title', 'Arsip')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Arsip</h1>
        </div>
        <div class="section-body">
           
            <h2 class="section-title">Informasi Data Arsip</h2>
            <p class="section-lead">
                Melalui halaman ini kamu bisa melihat seluruh data warga dan keluarga yang sudah diarsipkan, dan kamu bisa melakukan
                pemulihan data.
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
                                <form method="GET" action="{{ route('archive.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari nama keluarga" name="keyword">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <p class="text-muted">Data Keluarga</p>
                            
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
                                                        <form action="{{ route('archive.restoreFamily', $family->family_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-warning" id="archiveButton">
                                                                <i class="fas fa-trash"></i> Keluarkan
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
                            <p class="text-muted mt-4">Data Warga</p>
                            <div class="clearfix mb-3"></div>
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
                                    @foreach ($citizens as $citizen)
                                    <tr>
                                        <td>{{ $citizen->nik }}</td>
                                        <td>{{ $citizen->name }}</td>
                                        <td>{{ $citizen->gender }}</td>
                                        <td>{{ $citizen->phone_number }}</td>
                                        <td>{{ $citizen->address_domisili }}</td>
                                        <td>{{ $citizen->address_ktp }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('citizen.detail', $citizen->nik) }}" id="detailButton">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                        <form action="{{ route('archive.restoreCitizen', $citizen->nik) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-warning" id="archiveButton">
                                                                <i class="fas fa-trash"></i> Keluarkan
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
                                {{ $citizens->withQueryString()->links() }}
                            </div>

                            <p class="text-muted mt-4">Data Informasi</p>
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($informations as $info)
                                    <tr>
                                        <td>{{ $info->title }}</td>
                                        <td>{{ $info->desc }}</td>
                                        <td>{{ $info->date }}</td>
                                        <td>{{ $info->time }}</td>
                                        <td>{{ $info->place }}</td>
                                        <td>
                                            <img src="{{ Storage::url($info->image) }}" alt="Report Image" style="width: 50px;"></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <form action="{{ route('archive.restoreInformation', $info->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-warning" id="archiveButton">
                                                                <i class="fas fa-trash"></i> Keluarkan
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('archive.deleteInformation', $info->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" id="archiveButton">
                                                                <i class="fas fa-trash"></i> Hapus
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
                                {{ $citizens->withQueryString()->links() }}
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