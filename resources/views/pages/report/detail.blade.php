@extends('layouts.app')

@section('title', 'Detail Report')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Report</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $report->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $report->nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $report->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $report->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{ asset('storage/'.$report->image) }}" alt="Report Image" style="width: 200px;"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $report->status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
