@extends('layouts.app')

@section('title', 'Detail Laporan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Laporan</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h5>Judul Laporan: {{ $report->judul_laporan }}</h5>
                    <p>Nama: {{ $report->nama }}</p>
                    <p>Alamat: {{ $report->alamat }}</p>
                    <p>Tanggal: {{ $report->tanggal }}</p>
                    <p>Status: {{ $report->status }}</p>
                    <p>Image: <img src="{{ asset('storage/' . $report->image) }}" alt="Report Image" width="200"></p>
                    <a href="{{ route('report.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
