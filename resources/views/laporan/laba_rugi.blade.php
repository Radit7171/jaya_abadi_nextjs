<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Laba Rugi</title>
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
            <h4>Laporan Laba Rugi Bulanan</h4>
            <p>Periode: {{ $bulan }}-{{ $tahun }}</p>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.laba_rugi') }}" class="mb-4 no-print">
                <div class="row">
                    <div class="col-md-4">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select name="bulan" id="bulan" class="form-select">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $bulan == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control" value="{{ $tahun }}">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Keterangan</th>
                        <th>Jumlah (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total Penjualan Spare Part</td>
                        <td>{{ number_format($total_penjualan_sparepart, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Biaya Jasa Servis</td>
                        <td>{{ number_format($total_biaya_jasa, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="table-secondary">
                        <td><strong>Total Pendapatan</strong></td>
                        <td><strong>{{ number_format($total_penjualan_sparepart + $total_biaya_jasa, 0, ',', '.') }}</strong></td>
                    </tr>
                    <tr>
                        <td>Harga Modal Spare Part</td>
                        <td>{{ number_format($harga_modal, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="table-success">
                        <td><strong>Laba</strong></td>
                        <td><strong>{{ number_format($laba, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4 no-print">
                <button onclick="window.print()" class="btn btn-primary">Cetak Laporan</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
