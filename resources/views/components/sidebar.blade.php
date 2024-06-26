<style>
    .main-sidebar {
        width: 210px;
        /* Atur lebar sesuai kebutuhan Anda */
    }
</style>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <a href="{{ route('login') }}">
            <div class="sidebar-brand">
                <img src="{{ asset('img/logo.png') }}" alt="" width="142px">
            </div>
        </a>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="{{ Request::is('information') || Request::is('information/create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('information.index') }}"><i class="fa-solid fa-user"></i> <span>Pusat
                        Informasi</span></a>
            </li>

            @can('rtrw')
                <li
                    class="{{ Request::is('citizen*') || Request::is('family*') || Request::is('archive*') ? 'active' : '' }}">
                    <a class="nav-link has-dropdown"><i class="fa-solid fa-users"></i> <span>Warga</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('citizen*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('citizen.index') }}">Data Warga</a>
                        </li>
                        <li class="{{ Request::is('family*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('family.index') }}">Data Keluarga</a>
                        </li>
                        <li class="{{ Request::is('archive*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('archive.index') }}">Data Arsip</a>
                        </li>
                    </ul>
                </li>
            @endcan

            <li class="{{ Request::is('bansos') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('bansos.index') }}"><i class="fa-solid fa-money-bill"></i>
                    <span>Bantuan Sosial</span></a>
            </li>

            <li class="{{ Request::is('letter') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('letter.index') }}"><i class="fa-solid fa-envelope"></i>
                    <span>Penyuratan</span></a>
            </li>

            <li class="{{ Request::is('report') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('report.index') }}"><i class="fa-solid fa-comment"></i>
                    <span>Pelaporan Masalah</span></a>
            </li>

            <li class="{{ Request::is('facility') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('facility') }}"><i class="fa-solid fa-city"></i>
                    <span>Fasilitas</span></a>
            </li>
        </ul>
    </aside>
</div>
