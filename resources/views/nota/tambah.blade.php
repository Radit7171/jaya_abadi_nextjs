<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nota</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h4>Tambah Nota Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aksi_tambah_nota') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label">Kode Nota</label>
                                <input type="text" name="kode_nota" class="form-control" value="{{ $kode_nota }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Servis</label>
                                <select name="servis_id" id="servis_id" class="form-select">
                                    @foreach ($serviss as $servis)
                                        <option value="{{ $servis->id }}"
                                            data-pelanggan="{{ $servis->pelanggan->nama }}"
                                            data-pelanggan_id="{{ $servis->pelanggan->id }}"
                                            data-jasa="{{ $servis->biaya_jaya }}"
                                            data-sparepart="{{ $servis->detail_servis->sum('subtotal') }}">
                                            {{ $servis->kode_servis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Pelanggan</label>
                                <input type="text" id="pelanggan" class="form-control" readonly>
                                <input type="hidden" name="pelanggan_id" id="pelanggan_id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Jasa</label>
                                <input type="number" name="total_jasa" id="total_jasa" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Sparepart</label>
                                <input type="number" name="total_sparepart" id="total_sparepart" class="form-control"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Grand Total</label>
                                <input type="number" name="grand_total" id="grand_total" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Bayar</label>
                                <input type="date" name="tanggal_bayar" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status_bayar" class="form-select">
                                    <option value="belum">Belum</option>
                                    <option value="sudah">Sudah</option>
                                </select>
                            </div>
                            <div class="justify-content-around align-items-center d-flex">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const servisSelect = document.getElementById('servis_id');

        const pelangganInput = document.getElementById('pelanggan');
        const pelangganIdInput = document.getElementById('pelanggan_id');
        const jasaInput = document.getElementById('total_jasa');
        const sparepartInput = document.getElementById('total_sparepart');
        const grandInput = document.getElementById('grand_total');

        function isiData() {
            let selected = servisSelect.options[servisSelect.selectedIndex];

            let pelanggan = selected.getAttribute('data-pelanggan');
            let pelanggan_id = selected.getAttribute('data-pelanggan_id');
            let jasa = parseInt(selected.getAttribute('data-jasa')) || 0;
            let sparepart = parseInt(selected.getAttribute('data-sparepart')) || 0;

            pelangganInput.value = pelanggan;
            pelangganIdInput.value = pelanggan_id;
            jasaInput.value = jasa;
            sparepartInput.value = sparepart;
            grandInput.value = jasa + sparepart;
        }

        servisSelect.addEventListener('change', isiData);

        window.addEventListener('load', isiData);
    </script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
