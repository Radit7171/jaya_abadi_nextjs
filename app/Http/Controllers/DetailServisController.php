<?php

namespace App\Http\Controllers;

use App\Models\DetailServis;
use App\Models\Servis;
use App\Models\Spareparts;
use Illuminate\Http\Request;

class DetailServisController extends Controller
{
    public function tampil_tambah()
    {
        $serviss = Servis::all();
        $spareparts = Spareparts::all();
        return view('detail_servis.tambah', compact('serviss', 'spareparts'));
    }

    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'servis_id' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required',
            'harga_jual_saat_ini' => 'required',
            'subtotal' => 'required'
        ]);

        DetailServis::create($request->all());

        return redirect()->route('masuk_admin');
    }

    public function tampil_edit($id)
    {
        $detail_servis = DetailServis::findorfail($id);
        $serviss = Servis::all();
        $spareparts = Spareparts::all();
        return view('detail_servis.edit', compact('serviss', 'spareparts', 'detail_servis'));
    }

    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'servis_id' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required',
            'harga_jual_saat_ini' => 'required',
            'subtotal' => 'required'
        ]);

        $detail_servis = DetailServis::findorfail($id);

        $detail_servis->update($request->all());

        return redirect()->route('masuk_admin');
    }

    public function aksi_hapus($id)
    {
        $detail_servis = DetailServis::findorfail($id);

        $detail_servis->delete();

        return redirect()->route('masuk_admin');
    }
}
