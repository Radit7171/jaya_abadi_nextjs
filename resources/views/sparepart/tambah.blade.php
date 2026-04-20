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
                        <h4 class="fw-bold">Tambah Sparepart</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('aksi_tambah') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU :</label>
                                <input type="text" name="sku" class="form-control" id="sku">
                            </div>
                            <div class="mb-3">
                                <label for="nama_part" class="form-label">nama_part :</label>
                                <input type="text" name="nama_part" class="form-control" id="nama_part">
                            </div>
                            <div class="mb-3">
                                <label for="merk" class="form-label">merk :</label>
                                <input type="text" name="merk" class="form-control" id="merk">
                            </div>
                            <div class="mb-3">
                                <label for="tipe_laptop" class="form-label">tipe_laptop :</label>
                                <input type="text" name="tipe_laptop" class="form-control" id="tipe_laptop">
                            </div>
                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">harga_beli :</label>
                                <input type="text" name="harga_beli" class="form-control" id="harga_beli">
                            </div>
                            <div class="mb-3">
                                <label for="harga_jual" class="form-label">harga_jual :</label>
                                <input type="text" name="harga_jual" class="form-control" id="harga_jual">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">stok :</label>
                                <input type="text" name="stok" class="form-control" id="stok">
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
