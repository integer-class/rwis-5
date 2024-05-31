<!-- index.blade.php -->
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
                                                <i class="fas fa-edit"></i> Cek Berkas
                                            </a>
                                        </td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'rejected']) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <form action="{{ route('report.accept', $report->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Accept</button>
                                                    </form>
                                                </div>
                                            </div>
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
            <h1>Daftar Komplain Sudah di Unggah</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
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
                                @foreach ($reports as $report)
                                    @if ($report->status == 'accepted') <!-- Only show accepted reports here -->
                                        <tr>
                                            <td>
                                                <img src="{{ Storage::url($report->image) }}" alt="Report Image" style="width: 50px;">
                                            </td>
                                            <td>{{ $report->judul_laporan }}</td>
                                            <td>{{ $report->nama }}</td>
                                            <td>{{ $report->alamat }}</td>
                                            <td>{{ $report->tanggal }}</td>
                                            <td class="text-center">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-3">
                                                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-danger">Edit</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <form action="{{ route('report.changeStatus', ['id' => $report->id, 'status' => 'archived']) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success">Archive</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
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
