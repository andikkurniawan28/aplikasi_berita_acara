<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">
            📝 Aplikasi Berita Acara
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <!-- HOME -->
                {{-- <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('home.index') }}">
                        Home
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('kasuss.index') }}">
                        Kasus
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('jenis_kendaraan.index') }}">
                        Jenis Kendaraan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('material.index') }}">
                        Material
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('logout') }}">
                        Logout
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
