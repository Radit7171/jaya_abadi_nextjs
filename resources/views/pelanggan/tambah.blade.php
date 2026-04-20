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
    <div class="container mt-2">
        <div class="row justify-content-center align-items-center d-flex" style="height: 90vh">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="fw-bold">Tambah Pelanggan</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('aksi_tambah_pelanggan') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">nama :</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">no_hp :</label>
                                <input type="number" name="no_hp" class="form-control" id="no_hp">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">alamat :</label>
                                <input type="text" name="alamat" class="form-control" id="alamat">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">email :</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
