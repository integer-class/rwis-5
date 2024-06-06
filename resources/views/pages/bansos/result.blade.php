@extends('layouts.app')

@section('title', 'Bansos')

@push('style')
<!-- CSS Libraries -->
<style>
    .highlight {
        background-color: #ffff99;
        /* Change this to the color you want */
    }
</style>
@endpush

@section('main')<div class="main-content">
    <section class="section bansos">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('bansos.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Seleksi Bantuan Sosial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('bansos.index')}}">Bansos</a></div>
                <div class="breadcrumb-item">Seleksi Bansos</div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="title-table mb-4 text-center">Data Penerimaan Bantuan Sosial</h1>
                <div class="table-responsive">
                    <table class="table-striped table">
                        <tr>
                            <th>Prioritas</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($result as $bansos)
                        <tr class="{{ $loop->iteration == 1 ? 'table-success' : ($loop->iteration == 2 ? 'table-warning' : ($loop->iteration == 3 ? 'table-danger' : '')) }}">
                            <!-- index -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bansos['nik'] }}</td>
                            <td>{{ $bansos['name'] }}</td>
                            <td>{{ $bansos['value'] }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal" data-name="{{ $bansos['name'] }}" data-id="{{ $bansos['nik'] }}" data-income="{{ $bansos['income'] }}" data-job="{{ $bansos['job'] }}" data-education="{{ $bansos['education'] }}" data-disease="{{ $bansos['disease'] }}" data-disability="{{ $bansos['disability'] }}" data-age="{{ $bansos['age'] }}">
                                    Ajukan Bansos
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Detail Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nama: <span id="citizenName"></span></p>
                <p>Pendapatan: <span id="citizenIncome"></span></p>
                <p>Pekerjaan: <span id="citizenJob"></span></p>
                <p>Pendidikan: <span id="citizenEducation"></span></p>
                <p>Penyakit: <span id="citizenDisease"></span></p>
                <p>Disabilitas: <span id="citizenDisability"></span></p>
                <p>Umur: <span id="citizenAge"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="" id="submitLink" class="btn btn-primary">Ya, Ajukan</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
<script>
    $('#confirmModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('name') // Extract info from data-* attributes
        var id = button.data('id')
        var income = button.data('income')
        var job = button.data('job')
        var education = button.data('education')
        var disease = button.data('disease')
        var disability = button.data('disability')
        var age = button.data('age')

        var modal = $(this)
        modal.find('.modal-body #citizenName').text(name)
        modal.find('.modal-body #citizenIncome').text(income)
        modal.find('.modal-body #citizenJob').text(job)
        modal.find('.modal-body #citizenEducation').text(education)
        modal.find('.modal-body #citizenDisease').text(disease)
        modal.find('.modal-body #citizenDisability').text(disability)
        modal.find('.modal-body #citizenAge').text(age)
        modal.find('.modal-footer #submitLink').attr('href', '{{ url('') }}/bansos/submit/' + id) // jangan di enter
    })
</script>
@endpush