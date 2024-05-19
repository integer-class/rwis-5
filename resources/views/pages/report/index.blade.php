@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Masuk</h1>
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
                                    <th>Action</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                {{-- @foreach ($citizens as $citizen) --}}
                                    <tr>
                                        <td>
                                           1
                                        </td>
                                        <td>
                                            anu
                                        </td>
                                        <td>
                                            anu
                                        </td>
                                        <td>anu</td>
                                        <td>
                                            <a href='{{-- {{ route('user.edit', $citizens->nik) }} --}}'
                                                class="btn btn-outline-info btn-icon">
                                                <i class="fas fa-edit"></i>
                                                Cek Berkas
                                            </a>
                                        </td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col-md-2 offset-md-4">
                                                    <a href="" class="btn btn-danger">Reject</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="" class="btn btn-success">Accept</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                {{-- @endforeach --}}
            
            
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
                            <table class="table-striped table">
                                <tr>
            
                                    <th>Image</th>
                                    <th>Judul Laporan</th>
                                    <th>Pelapor</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Dilaporkan</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                {{-- @foreach ($citizens as $citizen) --}}
                                    <tr>
                                        <td>
                                           gambar macan 
                                        </td>
                                        <td>
                                            anu
                                        </td>
                                        <td>
                                            anu
                                        </td>
                                        <td>anu</td>
                                        <td>anu</td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <a href="" class="btn btn-danger">Reject</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="" class="btn btn-success">Accept</a>
                                                </div>
                                            </div>
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

    <!-- Page Specific JS File -->
@endpush
