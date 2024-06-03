@extends('layouts.app')

@section('title', 'Reports')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Masuk</h1>
            <a href="{{ route('report.create') }}" class="btn btn-primary" style="margin-left: 15px;">Buat Laporan</a>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
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
                                        <td>{{ $report->id }}</td>
                                        <td>{{ $report->nama }}</td>
                                        <td>{{ $report->alamat }}</td>
                                        <td>{{ $report->judul_laporan }}</td>
                                        <td>{{ $report->tanggal }}</td>
                                        <td>
                                            <img src="{{ Storage::url($report->image) }}" alt="Report Image" style="width: 50px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('report.show', $report->id) }}" class="btn btn-outline-info btn-icon">
                                                <i class="fas fa-file-alt"></i> Cek Berkas
                                            </a>
                                            @if ($report->status == 'Menunggu Verifikasi')
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'accepted']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success">Accept</button>
                                                </form>
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'rejected']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-secondary">Archive</button>
                                                </form>
                                            @elseif ($report->status == 'accepted')
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Menunggu Verifikasi']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-warning">Unaccept</button>
                                                </form>
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-secondary">Archive</button>
                                                </form>
                                            @elseif ($report->status == 'rejected')
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Menunggu Verifikasi']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-warning">Unreject</button>
                                                </form>
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-secondary">Archive</button>
                                                </form>
                                            @elseif ($report->status == 'archived')
                                                <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'Menunggu Verifikasi']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-success">Unarchive</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-header">
    <h1>Daftar Laporan</h1>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">

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
                                        <img src="{{ Storage::url($report->image) }}" alt="Report Image" style="width: 50px;">
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

            <!-- Section for Archived Reports -->
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
                                        <img src="{{ Storage::url($report->image) }}" alt="Report Image" style="width: 50px;">
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
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
