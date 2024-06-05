<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" width="227px" class="nav-logo">
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link nav-effect" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link nav-effect" href="#about">About</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link nav-effect" href="#program">Programs</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link nav-effect" href="#service">Services</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link nav-effect" href="#info">Info</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->nik }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="fa-solid fa-table-columns"></i> My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <form class="d-flex" role="search" action="{{ route('login') }}">
                        <button class="btn me-5 ms-3 btn-login" type="submit">Login</button>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>