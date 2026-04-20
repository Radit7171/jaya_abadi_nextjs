<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulasi Ukk</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif'
        }

        .hero {
            height: 90vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
            color: white;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand fw-bold fs-4">TechFix & Parts</a>

            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light px-4">Login</a>
            </div>
        </div>
    </nav>

    <section class="hero text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Selamat Datang Di TechFix & Parts</h1>
            <p class="lead mb-5 fs-4">
                Servis Laptop Profesional, Cepat, Bergaransi, Original, Resmi <br>
                Cepat - Aman - Nyaman
            </p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 py-3">Masuk</a>
        </div>
    </section>

    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; {{ date('Y') }} TechFix & Sparepart</p>
            <p class="mb-0 small text-light">
                Dibuat Oleh Raditiya Bagas Santoso - Semua Hak Cipta Dilindungi
            </p>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
