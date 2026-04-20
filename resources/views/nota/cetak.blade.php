<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nota</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            padding: 20px;
        }
        
        @media print {
            body {
                font-size: 12px;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header text-center bg-dark text-white">
            <h4>Nota Pembayaran</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Kode Nota:</strong> {{ $nota->kode_nota }} <br>
                <strong>Tanggal Bayar:</strong> {{ $nota->tanggal_bayar }} <br>
                <strong>Status:</strong> {{ strtoupper($nota->status_bayar) }}
            </div>
            <div class="mb-3">
                <strong>Nama Pelanggan:</strong> {{ $nota->servis->pelanggan->nama }} <br>
                <strong>Kode Servis:</strong> {{ $nota->servis->kode_servis }}
            </div>
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Sparepart</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nota->servis->detail_servis as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->sparepart->nama_part }}</td>
                            <td>{{ $item->harga_jual_saat_ini }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <p><strong>Total Jasa:</strong> {{ $nota->total_jasa }}</p>
                <p><strong>Total Sparepart:</strong> {{ $nota->total_sparepart }}</p>
                <h5><strong>Grand Total: {{ $nota->grand_total }}</strong></h5>
            </div>
            <div class="text-center mt-4 no-print">
                <button onclick="window.print()" class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
