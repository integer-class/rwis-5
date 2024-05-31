@extends('layouts.app')

@section('title', 'Archived Reports')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Archived Reports</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($archivedReports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->nama }}</td>
                                    <td>{{ $report->alamat }}</td>
                                    <td>{{ $report->tanggal }}</td>
                                    <td><img src="{{ asset('storage/'.$report->image) }}" alt="Report Image" style="width: 100px;"></td>
                                    <td>{{ $report->status }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
