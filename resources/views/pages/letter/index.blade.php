@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/dropzone/dist/dropzone.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section letter">
            <div class="section-header">
                <h1>Unggah Templat Surat</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="#" class="dropzone" id="mydropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="section-header">
                <h1>Verifikasi Tanda Tangan Digital</h1>
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
                                    <th>Action</th>
                                </tr>
                                {{-- @foreach ($citizens as $citizen) --}}
                                    <tr>
                                        <td>
                                           anu
                                        </td>
                                        <td>
                                            anu
                                        </td>
                                        <td>
                                            anu
                                        </td>
                                        <td><span class="badge badge-success">Sudah Verifikasi</span></td>
                                        <td>
                                            <a href='{{-- {{ route('user.edit', $citizens->nik) }} --}}'
                                                class="btn btn-outline-info btn-icon">
                                                <i class="fas fa-edit"></i>
                                                Cek Berkas
                                            </a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
            
            
                            </table>
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
