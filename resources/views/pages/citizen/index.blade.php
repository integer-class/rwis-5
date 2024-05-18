@extends('layouts.app')

@section('title', 'Users')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Warga</h1>
            <div class="section-header-button">
                <a href="{{ route('citizen.create') }}" class="btn btn-primary">Tambah Baru</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('citizen') }}">Users</a></div>
                <div class="breadcrumb-item">Semua Data</div>
            </div>
        </div>
        <div class="section-body">
            {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
            <h2 class="section-title">Data Warga</h2>
            <p class="section-lead">
                You can manage all Users, such as editing, deleting and more.
            </p>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="{{ route('citizen.index') }}">
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

                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Pekerjaan</th>
                                        <th>RT</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($citizens as $citizen)
                                    <tr>

                                        <td>{{ $citizen->citizen_data_id }}
                                        </td>
                                        <td>
                                            {{ $citizen->name }}
                                        </td>
                                        <td>
                                            {{ $citizen->job }}
                                        </td>
                                        <td>
                                            {{ $citizen->rt }}
                                        </td>
                                        <td>
                                            {{ $citizen->address_domisili }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- edit -->
                                                <a href="{{ route('citizen.edit', $citizen->citizen_data_id) }}"
                                                    class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="{{ route('citizen.archive', $citizen->citizen_data_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                        <i class="fas fa-times"></i> Archive
                                                    </button>
                                                </form>
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
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

