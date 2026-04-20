<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h2 class="h2 text-center text-light">Edit Data Servis {{ $servis->kode_servis }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aksi_edit_servis', $servis->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kode_servis" class="form-label">Kode Servis :</label>
                                <input type="text" name="kode_servis" id="kode_servis" class="form-control mt-1 disabled" value="{{ $servis->kode_servis }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="pelanggan_id" class="form-label">Nama Pelanggan :</label>
                                <select name="pelanggan_id" id="pelanggan_id" class="form-select">
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Nama User Login :</label>
                                <select name="user_id" id="user_id" class="form-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan :</label>
                                <input type="text" name="keluhan" id="keluhan" class="form-control mt-1" value="{{ $servis->keluhan }}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status :</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Dikerjakan">Dikerjakan</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk :</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control mt-1" value="{{ $servis->tanggal_masuk }}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai :</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control mt-1" value="{{ $servis->tanggal_selesai }}">
                            </div>
                            <div class="mb-3">
                                <label for="biaya_jaya" class="form-label">Biaya Jasa :</label>
                                <input type="number" name="biaya_jaya" id="biaya_jaya" class="form-control mt-1" value="{{ $servis->biaya_jaya }}">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary">Edit Data</button>
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
