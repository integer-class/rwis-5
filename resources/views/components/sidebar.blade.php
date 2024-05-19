<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="" width="142px">
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a>
            </li>

            <li class="{{ Request::is('information') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('information') }}"><i class="far fa-user"></i> <span>Pusat Informasi</span></a>
            </li>

            <li class="{{ Request::is('citizen') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('citizen') }}"><i class="fa-solid fa-user-group"></i> <span>Data Warga</span></a>
            </li>

            <li class="{{ Request::is('bansos') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('bansos') }}"><i class="fa-solid fa-money-bill"></i> <span>Bantuan Sosial</span></a>
            </li>

            <li class="{{ Request::is('letter') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('letter') }}"><i class="fa-solid fa-envelope"></i> <span>Penyuratan</span></a>
            </li>

            <li class="{{ Request::is('report') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('report') }}"><i class="fa-solid fa-comment"></i> <span>Pelaporan Masalah</span></a>
            </li>

            <li class="{{ Request::is('facility') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('facility') }}"><i class="fa-solid fa-city"></i> <span>Fasilitas</span></a>
            </li>
           
        </ul> 
    </aside>
</div>
