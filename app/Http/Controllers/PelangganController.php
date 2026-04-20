<?php

namespace App\Http\Controllers;

use App\Models\Pelanggans;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function tampil_tambah()
    {
        return view('pelanggan.tambah');
    }

    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        Pelanggans::create($request->all());

        return redirect()->route('masuk_admin');
    }

    public function tampil_edit($id)
    {
        $pelanggan = Pelanggans::findorfail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        $pelanggan = Pelanggans::findorfail($id);

        $pelanggan->update($request->all());

        return redirect()->route('masuk_admin');
    }

    public function aksi_hapus($id)
    {
        $pelanggan = Pelanggans::findorfail($id);
        $pelanggan->delete();
        return redirect()->route('masuk_admin');
    }
}
