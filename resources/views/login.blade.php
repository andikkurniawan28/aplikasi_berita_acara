<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Berita Acara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f0f2f5;
        }

        .card {
            border-radius: 12px;
        }

        .captcha-box {
            font-size: 24px;
            font-weight: bold;
            padding: 10px 20px;
            background: #343a40;
            color: #fff;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-sm" style="width: 400px;">

            <h4 class="text-center mb-3">Aplikasi Berita Acara</h4>

            @if(session('error'))
                <div class="alert alert-danger text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login_process') }}" method="POST">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username"
                           value="{{ old('username') }}"
                           class="form-control @error('username') is-invalid @enderror"
                           placeholder="Masukkan username" autofocus>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Masukkan password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 mt-2" type="submit">Login</button>
            </form>

            <div class="credit-text text-center">
                <br>
                ©2025-Andik Kurniawan
            </div>

        </div>
    </div>

</body>

</html>
