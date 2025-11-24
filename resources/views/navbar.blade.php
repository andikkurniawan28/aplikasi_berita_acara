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
                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('home.index') }}">
                        Home
                    </a>
                </li>

                <!-- MASTER KASUS -->
                <li class="nav-item">
                    <a class="nav-link"
                        href="">
                        Kasus
                    </a>
                </li>

                <!-- MASTER JENIS KENDARAAN -->
                <li class="nav-item">
                    <a class="nav-link"
                        href="">
                        Jenis Kendaraan
                    </a>
                </li>

                <!-- MASTER MATERIAL -->
                <li class="nav-item">
                    <a class="nav-link"
                        href="">
                        Material
                    </a>
                </li>

                <!-- MASTER MATERIAL -->
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
