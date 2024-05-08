<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" width="227px" class="nav-logo">
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link" href="#">Programs</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item me-3 ms-3">
                    <a class="nav-link" href="#">Info</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('login') }}">
                <button class="btn me-5 ms-3 btn-login" type="submit">Login</button>
            </form>
        </div>
    </div>
</nav>
