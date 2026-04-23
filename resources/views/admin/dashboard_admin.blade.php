<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif';
        }

        .section-tabel {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top mb-5">
        <div class="container py-2">
            <a href="#" class="navbar-brand fw-bold">TechFix & Parts</a>
            <div class="ms-auto">
                <a href="{{ route('laporan.laba_rugi') }}" class="btn btn-outline-light me-2">Laporan Laba Rugi</a>
                <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>
    <section class="section-tabel">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h2">Tabel Sparepart</h2>
                            <a href="{{ route('tampil_tambah_sparepart') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>SKU</th>
                                <th>Nama Part</th>
                                <th>Merk</th>
                                <th>Tipe Laptop</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Aksi</th>
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
                                    <td>{{ $sparepart->harga_beli }}</td>
                                    <td>{{ $sparepart->harga_jual }}</td>
                                    <td>{{ $sparepart->stok }}</td>
                                    <td>
                                        <a href="{{ route('tampil_edit', $sparepart->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('aksi_hapus', $sparepart->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h2">Tabel Pelanggan</h2>
                            <a href="{{ route('tampil_tambah_pelanggan') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $pelanggan)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->no_hp }}</td>
                                    <td>{{ $pelanggan->alamat }}</td>
                                    <td>{{ $pelanggan->email }}</td>
                                    <td>
                                        <a href="{{ route('tampil_edit_pelanggan', $pelanggan->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('aksi_hapus_pelanggan', $pelanggan->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h2">Tabel User</h2>
                            <a href="{{ route('tampil_tambah_user_crud') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('tampil_edit_user_crud', $user->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('aksi_hapus_user_crud', $user->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h2">Tabel Servis</h2>
                            <a href="{{ route('tampil_tambah_servis') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Servis</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama User Login</th>
                                <th>Keluhan</th>
                                <th>Status</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Biaya Jasa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviss as $servis)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $servis->kode_servis }}</td>
                                    <td>{{ $servis->pelanggan->nama ?? '-' }}</td>
                                    <td>{{ $servis->user->name ?? '-' }}</td>
                                    <td>{{ $servis->keluhan }}</td>
                                    <td>{{ $servis->status }}</td>
                                    <td>{{ $servis->tanggal_masuk }}</td>
                                    <td>{{ $servis->tanggal_selesai }}</td>
                                    <td>{{ $servis->biaya_jaya }}</td>
                                    <td>
                                        <a href="{{ route('tampil_edit_servis', $servis->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('aksi_hapus_servis', $servis->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h2">Tabel Detail Servis</h2>
                            <a href="{{ route('tampil_tambah_detail_servis') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Servis</th>
                                <th>SKU Sparepart</th>
                                <th>Qty</th>
                                <th>Harga Jual Saat Ini</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_serviss as $detail_servis)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail_servis->servis->kode_servis ?? '-' }}</td>
                                    <td>{{ $detail_servis->sparepart->sku ?? '-' }}</td>
                                    <td>{{ $detail_servis->qty }}</td>
                                    <td>{{ $detail_servis->harga_jual_saat_ini }}</td>
                                    <td>{{ $detail_servis->subtotal }}</td>
                                    <td>
                                        <a href="{{ route('tampil_edit_detail_servis', $detail_servis->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('aksi_hapus_detail_servis', $detail_servis->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h2">Tabel Nota Pembayaran</h2>
                            <a href="{{ route('tampil_tambah_nota') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Nota</th>
                                <th>Kode Servis</th>
                                <th>Nama Pelanggan</th>
                                <th>Total Jasa</th>
                                <th>Total Sparepart</th>
                                <th>Grand Total</th>
                                <th>Tanggal Bayar</th>
                                <th>Status Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nota_pembayarans as $nota_pembayaran)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nota_pembayaran->kode_nota }}</td>
                                    <td>{{ $nota_pembayaran->servis->kode_servis }}</td>
                                    <td>{{ $nota_pembayaran->pelanggan->nama }}</td>
                                    <td>{{ $nota_pembayaran->total_jasa }}</td>
                                    <td>{{ $nota_pembayaran->total_sparepart }}</td>
                                    <td>{{ $nota_pembayaran->grand_total }}</td>
                                    <td>{{ $nota_pembayaran->tanggal_bayar }}</td>
                                    <td>{{ $nota_pembayaran->status_bayar }}</td>
                                    <td>
                                        <a href="{{ route('cetak_nota', $nota_pembayaran->id) }}" class="btn btn-sm btn-info me-2">Cetak</a>
                                        <a href="{{ route('tampil_edit_nota', $nota_pembayaran->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('aksi_hapus_nota', $nota_pembayaran->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
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
