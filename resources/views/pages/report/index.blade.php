@extends('layouts.app')

@section('title', 'Reports')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <a href="{{ route('report.create') }}" class="btn btn-primary"
                style="margin-left: 15px;margin-top: 60px;margin-bottom: 20px;padding: 10px 10px; font-size: 15px;"> + Buat
                Laporan</a>

            @can('rtrw')
                <div class="section-header" style="margin-top: 20px;">
                    <h1>Laporan Masuk</h1>
                </div>

                <div class="section-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Judul Laporan</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $report)
                                            <tr>
                                                <td>{{ $report->nik }}</td>
                                                <td>{{ $report->nama }}</td>
                                                <td>{{ $report->alamat }}</td>
                                                <td>{{ $report->judul_laporan }}</td>
                                                <td>{{ $report->tanggal }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($report->image) }}" alt="Report Image"
                                                        style="width: 50px;">
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('report.show', $report->id) }}"
                                                            class="btn btn-outline-info btn-icon mr-2">
                                                            <i class="fas fa-file-alt"></i> Cek Berkas
                                                        </a>

                                                        <div class="dropdown d-inline">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Aksi
                                                            </button>

                                                            @if ($report->status == 'Menunggu Verifikasi')
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Diterima']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-success">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Ditolak']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger">
                                                                            <i class="fas fa-times"></i> Reject
                                                                        </button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-secondary">
                                                                            <i class="fas fa-archive"></i> Archive
                                                                        </button>
                                                                    </form>
                                                                @elseif ($report->status == 'Diterima')
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Menunggu Verifikasi']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-warning">
                                                                            <i class="fas fa-undo"></i> Unaccept
                                                                        </button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-secondary">
                                                                            <i class="fas fa-archive"></i> Archive
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                @elseif ($report->status == 'Ditolak')
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Menunggu Verifikasi']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-warning">
                                                                            <i class="fas fa-undo"></i> Unreject
                                                                        </button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-secondary">
                                                                            <i class="fas fa-archive"></i> Archive
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                @elseif ($report->status == 'archived')
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <form
                                                                        action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Menunggu Verifikasi']) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-success">
                                                                            <i class="fas fa-undo"></i> Unarchive
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>


                            </div>
                            </td>
                            <td>
                                @if ($report->status == 'Diterima')
                                    <span class="badge badge-success">Accepted</span>
                                @elseif ($report->status == 'Ditolak')
                                    <span class="badge badge-danger">Rejected</span>
                                @elseif ($report->status == 'archived')
                                    <span class="badge badge-secondary">Archived</span>
                                @else
                                    <span class="badge badge-primary">Menunggu Verifikasi</span>
                                @endif
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            {{ $reports->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
        </div>
    @endcan

    <div class="section-header">
        <h1>Daftar Laporan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @can('warga')
                    <!-- Section for All Reports -->
                    <h2>Status Laporan Sudah Di Unggah</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Judul Laporan</th>
                                    <th>Pelapor</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Dilaporkan</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    @if ($report->status == 'accepted' || $report->status == 'rejected' || $report->status == 'Menunggu Verifikasi')
                                        <tr>
                                            <td>
                                                <img src="{{ Storage::url($report->image) }}" alt="Report Image"
                                                    style="width: 50px;">
                                            </td>
                                            <td>{{ $report->judul_laporan }}</td>
                                            <td>{{ $report->nama }}</td>
                                            <td>{{ $report->alamat }}</td>
                                            <td>{{ $report->tanggal }}</td>
                                            <td class="text-center">
                                                @if ($report->status == 'accepted')
                                                    <span class="badge badge-success">Accepted</span>
                                                @elseif ($report->status == 'rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @elseif ($report->status == 'archived')
                                                    <span class="badge badge-secondary">Archived</span>
                                                @else
                                                    <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        {{ $reports->withQueryString()->links() }}
                    </div>
                @endcan
                <br><br>
                <!-- Section for Archived Reports -->
                @can('rtrw')
                    <h2>Laporan Terarsipkan</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Judul Laporan</th>
                                    <th>Pelapor</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Dilaporkan</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    @if ($report->status == 'archived')
                                        <tr>
                                            <td>
                                                <img src="{{ Storage::url($report->image) }}" alt="Report Image"
                                                    style="width: 50px;">
                                            </td>
                                            <td>{{ $report->judul_laporan }}</td>
                                            <td>{{ $report->nama }}</td>
                                            <td>{{ $report->alamat }}</td>
                                            <td>{{ $report->tanggal }}</td>
                                            <td class="text-center">
                                                <span class="badge badge-secondary">Archived</span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        {{ $reports->withQueryString()->links() }}
                    </div>
                @endcan
            </div>
        </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
