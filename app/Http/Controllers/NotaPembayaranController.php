<?php

namespace App\Http\Controllers;

use App\Models\NotaPembayaran;
use App\Models\Servis;
use Illuminate\Http\Request;

class NotaPembayaranController extends Controller
{
    public function tampil_tambah()
    {
        $kode_nota = 'NOTA -' . date('Ymd') . '-' . rand(1000, 9999);
        $serviss = Servis::with(['pelanggan', 'detail_servis'])->get();

        return view('nota.tambah', compact('serviss', 'kode_nota'));
    }

    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'kode_nota' => 'required',
            'servis_id' => 'required',
            'pelanggan_id' => 'required',
            'total_jasa' => 'required',
            'total_sparepart' => 'required',
            'grand_total' => 'required',
            'tanggal_bayar' => 'required',
            'status_bayar' => 'required'
        ]);

        NotaPembayaran::create($request->all());

        return redirect()->route('masuk_admin');
    }

    public function tampil_edit($id)
    {
        $nota = NotaPembayaran::findorfail($id);
        $serviss = Servis::with(['pelanggan', 'detail_servis'])->get();

        return view('nota.edit', compact('nota', 'serviss'));
    }

    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'servis_id' => 'required',
            'pelanggan_id' => 'required',
            'tanggal_bayar' => 'required',
            'status_bayar' => 'required'
        ]);

        $nota = NotaPembayaran::findorfail($id);

        $nota->update($request->all());

        return redirect()->route('masuk_admin');
    }

    public function aksi_hapus($id)
    {
        $nota = NotaPembayaran::findorfail($id);

        $nota->delete();

        return redirect()->route('masuk_admin');
    }

    public function cetak_nota($id)
    {
        $nota = NotaPembayaran::with(['servis.pelanggan', 'servis.detail_servis.sparepart'])->findOrFail($id);

        return view('nota.cetak', compact('nota'));
    }
}
