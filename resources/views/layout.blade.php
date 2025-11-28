<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Berita Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('navbar')
    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center fixed-bottom bg-light py-2 shadow-sm">
        <div class="credit-text">
            ©2025 - Andik Kurniawan
        </div>
    </footer>

</body>
</html>
