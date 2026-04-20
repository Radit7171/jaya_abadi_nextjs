<?php

namespace App\Http\Controllers;

use App\Models\Spareparts;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function tampil_tambah()
    {
        return view('sparepart.tambah');
    }

    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'sku' => 'required',
            'nama_part' => 'required',
            'merk' => 'required',
            'tipe_laptop' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
        ]);

        Spareparts::create($request->all());

        return redirect()->route('masuk_admin');
    }

    public function tampil_edit($id)
    {
        $sparepart = Spareparts::find($id);
        return view('sparepart.edit', compact('sparepart'));
    }

    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'sku' => 'required',
            'nama_part' => 'required',
            'merk' => 'required',
            'tipe_laptop' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
        ]);

        $sparepart = Spareparts::find($id);

        $sparepart->update($request->all());

        return redirect()->route('masuk_admin');
    }

    public function aksi_hapus($id)
    {
        $sparepart = Spareparts::find($id);
        $sparepart->delete();
        return redirect()->route('masuk_admin');
    }
}
