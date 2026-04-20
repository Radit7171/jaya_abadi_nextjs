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
                        <h4>Edit Nota Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aksi_edit_nota', $nota->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Kode Nota</label>
                                <input type="text" class="form-control" value="{{ $nota->kode_nota }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Pilih Servis</label>
                                <select name="servis_id" id="servis_id" class="form-select">
                                    @foreach ($serviss as $servis)
                                        <option value="{{ $servis->id }}"
                                            data-pelanggan="{{ $servis->pelanggan->nama }}"
                                            data-pelanggan_id="{{ $servis->pelanggan->id }}"
                                            data-jasa="{{ $servis->biaya_jaya }}"
                                            data-sparepart="{{ $servis->detail_servis->sum('subtotal') }}"
                                            {{ $nota->servis_id == $servis->id ? 'selected' : '' }}>
                                            {{ $servis->kode_servis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Nama Pelanggan</label>
                                <input type="text" id="pelanggan" class="form-control" readonly>
                                <input type="hidden" name="pelanggan_id" id="pelanggan_id">
                            </div>
                            <div class="mb-3">
                                <label>Total Jasa</label>
                                <input type="number" id="total_jasa" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Total Sparepart</label>
                                <input type="number" id="total_sparepart" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Grand Total</label>
                                <input type="number" id="grand_total" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Bayar</label>
                                <input type="date" name="tanggal_bayar" class="form-control" value="{{ $nota->tanggal_bayar }}">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status_bayar" class="form-select">
                                    <option value="belum">Belum</option>
                                    <option value="sudah">Sudah</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary">Edit</button>
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
