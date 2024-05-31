@extends('layouts.app')

@section('title', 'Bansos')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
    <section class="section bansos">
        <div class="section-header">
            <h1>Seleksi Bantuan Sosial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('information.create') }}" class="btn btn-primary">Tambahkan Informasi</a></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="title-table mb-4 text-center">Data Penerimaan Bantuan Sosial</h1>
                <div class="table-responsive">
                    <table class="table-striped table">
                        <tr>
                            <th>ID</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($result as $bansos)
                        <tr>
                            <td>{{ $bansos['citizen_data_id'] }}</td>
                            <td>{{ $bansos['value'] }}</td>
                            <td>
                                eksyen
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush