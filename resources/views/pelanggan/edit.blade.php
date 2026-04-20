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
                        <h4 class="fw-bold">Edit Pelanggan {{ $pelanggan->nama }}</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('aksi_edit_pelanggan', $pelanggan->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama :</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $pelanggan->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP :</label>
                                <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{ $pelanggan->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat :</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $pelanggan->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $pelanggan->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
