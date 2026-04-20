<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h2 class="h2 text-center text-light">Edit Data Detail Servis</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aksi_edit_detail_servis', $detail_servis->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="servis_id" class="form-label">Kode Servis :</label>
                                <select name="servis_id" id="servis_id" class="form-select mt-1">
                                    @foreach ($serviss as $servis)
                                        <option value="{{ $servis->id }}">{{ $servis->kode_servis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sparepart_id" class="form-label">SKU Sparepart :</label>
                                <select name="sparepart_id" id="sparepart_id" class="form-select mt-1">
                                    @foreach ($spareparts as $sparepart)
                                        <option value="{{ $sparepart->id }}" data-harga="{{ $sparepart->harga_jual }}">{{ $sparepart->sku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">QTY :</label>
                                <input type="number" name="qty" id="qty" class="form-control" value="{{ $detail_servis->qty }}">
                            </div>
                            <div class="mb-3">
                                <label for="harga_jual_saat_ini" class="form-label">Harga Jual Saat Ini :</label>
                                <input type="number" name="harga_jual_saat_ini" id="harga_jual_saat_ini" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="subtotal" class="form-label">Sub Total :</label>
                                <input type="number" name="subtotal" id="subtotal" class="form-control" readonly>
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
    <script>
        const sparepartSelect = document.getElementById('sparepart_id');
        const hargaInput = document.getElementById('harga_jual_saat_ini');
        const qtyInput = document.getElementById('qty');
        const subtotalInput = document.getElementById('subtotal');

        function hitung_subtotal() {
            let qty = parseInt(qtyInput.value) || 0;
            let harga = parseInt(hargaInput.value) || 0;

            subtotalInput.value = qty * harga;
        }

        sparepartSelect.addEventListener('change', function () {
            let harga = this.options[this.selectedIndex].getAttribute('data-harga');
            hargaInput.value = harga;
            hitung_subtotal();
        });

        qtyInput.addEventListener('input', hitung_subtotal);

        window.addEventListener('load', function () {
            sparepartSelect.dispatchEvent(new Event('change'));
        });

    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
