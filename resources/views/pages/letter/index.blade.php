@extends('layouts.app')

@section('title', 'Persuratan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/dropzone/dist/dropzone.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section letter">
            <div class="section-header">
                <h1>Templat Surat</h1>
                @can('admin')
                    <div class="section-header-button">
                        <a href="{{ route('template.create') }}" class="btn btn-primary" id="tambahButton">Tambah</a>
                    </div>
                @endcan

            </div>

            <div class="section-body">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($templates as $temp)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="title mb-4">{{ $temp->name }}</h1>
                                            <embed src="{{ '/storage/template_letters/' . $temp->path }}"
                                                type="application/pdf" width="100%" height="600px">

                                            @can('admin')
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('template.edit', $temp->id) }}">
                                                        <button class="btn btn-primary" type="button" id="editButton">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('template.archive', $temp->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" id="archiveButton">
                                                            <i class="fas fa-trash"></i> Arsipkan
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="float-right">
                            {{ $templates->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-header">
                <h1>Verifikasi Tanda Tangan Digital</h1>
                @can('admin')
                    <div class="section-header-button">
                        <a href="{{ route('letter.create') }}" class="btn btn-primary" id="tambahButton">Tambah</a>
                    </div>
                @endcan

            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title mb-4">Penerimaan Tanda Tangan Digital</h1>
                        <div class="table-responsive">
                            <table class="table-striped table">
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. Whatsapp</th>
                                    <th>Status</th>
                                    @can('admin')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                                @foreach ($letters as $letter)
                                    <tr>
                                        <td>
                                            {{ $letter->name }}
                                        </td>
                                        <td>
                                            {{ $letter->address }}
                                        </td>
                                        <td>
                                            {{ $letter->whatsapp_number }}
                                        </td>

                                        <td>
                                            @if ($letter->status == 'Belum Verifikasi')
                                                <span class="badge badge-danger">{{ $letter->status }}</span>
                                            @elseif ($letter->status == 'Sudah Verifikasi')
                                                <span class="badge badge-success">{{ $letter->status }}</span>
                                            @else
                                                <span class="badge badge-secondary">{{ $letter->status }}</span>
                                            @endif
                                        </td>
                                        @can('admin')
                                            <td>
                                                <div class="d-flex justify-content-left">
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ '/storage/letters/' . $letter->file_path }}"
                                                                id="detailButton" target="_blank">
                                                                <i class="fas fa-eye"></i> Cek Berkas
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('letter.edit', $letter->id) }}" id="editButton">
                                                                <i class="fas fa-edit"></i> Update
                                                            </a>

                                                            <div class="dropdown-divider"></div>

                                                            <form action="{{ route('letter.archive', $letter->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-warning"
                                                                    id="archiveButton">
                                                                    <i class="fas fa-trash"></i> Arsipkan
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="float-right">
                            {{ $letters->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/dropzone/dist/min/dropzone.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-multiple-upload.js') }}"></script>
@endpush
