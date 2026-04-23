<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Teknisi</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .section-tabel {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top mb-5">
        <div class="container py-2">
            <a href="#" class="navbar-brand fw-bold">TechFix & Parts - Teknisi</a>
            <div class="ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <section class="section-tabel">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-12">
                    <div class="mb-3">
                        <h2 class="h2">Daftar Kerja Servis</h2>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Servis</th>
                                <th>Pelanggan</th>
                                <th>Keluhan</th>
                                <th>Status</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviss as $servis)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $servis->kode_servis }}</td>
                                    <td>{{ $servis->pelanggan->nama }}</td>
                                    <td>{{ $servis->keluhan }}</td>
                                    <td>{{ $servis->status }}</td>
                                    <td>{{ $servis->tanggal_masuk }}</td>
                                    <td>{{ $servis->tanggal_selesai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section-tabel">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-12">
                    <div class="mb-3">
                        <h2 class="h2">Stok Sparepart</h2>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>SKU</th>
                                <th>Nama Part</th>
                                <th>Merk</th>
                                <th>Tipe Laptop</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spareparts as $sparepart)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sparepart->sku }}</td>
                                    <td>{{ $sparepart->nama_part }}</td>
                                    <td>{{ $sparepart->merk }}</td>
                                    <td>{{ $sparepart->tipe_laptop }}</td>
                                    <td>{{ $sparepart->stok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
