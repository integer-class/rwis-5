@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                @if (Auth::user()->level == 'warga')
                    <h1>Dashboard Warga</h1>
                @elseif(Auth::user()->level == 'rt')
                    <h1>Dashboard RT</h1>
                @elseif(Auth::user()->level == 'rw')
                    <h1>Dashboard RW</h1>
                @endif
            </div>
            @can('rtrw')
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Warga</h4>
                            </div>
                            <div class="card-body">
                                {{ $citizenTotal }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-male"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Laki-laki</h4>
                            </div>
                            <div class="card-body">
                                {{ $womanTotal }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-female"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Perempuan</h4>
                            </div>
                            <div class="card-body">
                                {{ $manTotal }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 col-sm-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Penerima Bansos</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalPenerimaBansos }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 col-sm-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-gift"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Penerima Bansos</h4>
                                </div>
                                <div class="card-body">
                                    {{ $penerimaBansos }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 col-sm-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Dalam Pengajuan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dalamProses }}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pendidikan Warga</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPendidikan" height="215"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Diagram Umur Warga</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartUmur" height="182"></canvas>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Diagram Golongan Darah Warga</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartGolonganDarah" height="182"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <!-- grafik pekerjaan -->
                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pekerjaan Warga</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chartPekerjaan" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- progress bar pekerjaan -->
                        <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Pendapatan Warga</h4>
                                </div>
                            <div class="card-body">
                                <canvas id="chartPendapatan" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kontak RW</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($isRW as $item)
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar">
                                        <div class="media-body">
                                            <div class="media-right">
                                                <div class="text-primary">{{ $item->name }}</div>
                                            </div>
                                            <div class="media-title">{{ $item->phone_number }}</div>
                                            <div class="text-muted">{{ $item->address_domisili }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kontak RT</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($isRT as $item)
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar">
                                        <div class="media-body">
                                            <div class="media-right">
                                                <div class="text-primary">{{ $item->name }}</div>
                                            </div>
                                            <div class="media-title">{{ $item->phone_number }}</div>
                                            <div class="text-muted">RT {{ $item->no_rt }}</div>
                                            <div class="text-muted">{{ $item->address_domisili }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chartPendidikan').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Dibawah SMA', 'SMA', 'S1', 'S2', 'S3'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $underSma }}, {{ $Sma }}, {{ $S1 }}, {{ $S2 }}, {{ $S3 }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('chartUmur').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0-17', '18-50', '51-100'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $under18 }}, {{ $from18to50 }}, {{ $above50 }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('chartGolonganDarah').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['A', 'B', 'AB', 'O'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $bloodA }}, {{ $bloodB }}, {{ $bloodAB }}, {{ $bloodO }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('chartPekerjaan').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Wiraswasta', 'Swasta', 'Negeri', 'Petani', 'Nelayan', 'Lainnya'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $wiraswasta }}, {{ $swasta }}, {{ $negeri }}, {{ $petani }}, {{ $nelayan }}, {{ $lainnya }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('chartPendapatan').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['<1jt', '1-2jt', '2-3jt', '3-4jt', '4-5jt', '>5jt'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{$income1}}, {{$income2}}, {{$income3}}, {{$income4}}, {{$income5}}, {{$income6}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
@endpush
