<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulasi Ukk</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex" style="height: 90vh">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="fw-bold">Silahkan Register</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('aksi_register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama :</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-primary" type="submit">Register</button>
                                <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
