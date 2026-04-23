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
            'qty' => 'required|integer|min:1'
        ]);

        $sparepart = Spareparts::findOrFail($request->sparepart_id);
        $servis = Servis::findOrFail($request->servis_id);

        if ($sparepart->stok < $request->qty) {
            $servis->update(['status' => 'Menunggu Sparepart']);
            return redirect()->back()->with('error', 'Stok sparepart tidak cukup. Status servis diubah ke Menunggu Sparepart.');
        }

        $sparepart->decrement('stok', $request->qty);

        $harga = $sparepart->harga_jual;
        $subtotal = $request->qty * $harga;

        DetailServis::create([
            'servis_id' => $request->servis_id,
            'sparepart_id' => $request->sparepart_id,
            'qty' => $request->qty,
            'harga_jual_saat_ini' => $harga,
            'subtotal' => $subtotal
        ]);

        return redirect()->route('masuk_admin')->with('success', 'Sparepart berhasil ditambahkan ke servis.');
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
            'qty' => 'required|integer|min:1'
        ]);

        $detail_servis = DetailServis::findorfail($id);
        $sparepart = Spareparts::findOrFail($request->sparepart_id);
        $servis = Servis::findOrFail($request->servis_id);

        $old_qty = $detail_servis->qty;
        $new_qty = $request->qty;
        $selisih = $new_qty - $old_qty;

        if ($selisih > 0) {
            if ($sparepart->stok < $selisih) {
                $servis->update(['status' => 'Menunggu Sparepart']);
                return redirect()->back()->with('error', 'Stok sparepart tidak cukup untuk penambahan qty. Status servis diubah ke Menunggu Sparepart.');
            }
            $sparepart->decrement('stok', $selisih);
        } elseif ($selisih < 0) {
            $sparepart->increment('stok', abs($selisih));
        }

        if ($detail_servis->sparepart_id != $request->sparepart_id) {
            $old_sparepart = Spareparts::findOrFail($detail_servis->sparepart_id);
            $old_sparepart->increment('stok', $old_qty);

            if ($sparepart->stok < $new_qty) {
                $servis->update(['status' => 'Menunggu Sparepart']);
                return redirect()->back()->with('error', 'Stok sparepart baru tidak cukup.');
            }
            $sparepart->decrement('stok', $new_qty);
        }

        $harga = $sparepart->harga_jual;
        $subtotal = $new_qty * $harga;

        $detail_servis->update([
            'servis_id' => $request->servis_id,
            'sparepart_id' => $request->sparepart_id,
            'qty' => $new_qty,
            'harga_jual_saat_ini' => $harga,
            'subtotal' => $subtotal
        ]);

        return redirect()->route('masuk_admin')->with('success', 'Detail servis berhasil diupdate.');
    }

    public function aksi_hapus($id)
    {
        $detail_servis = DetailServis::findorfail($id);

        $sparepart = Spareparts::findOrFail($detail_servis->sparepart_id);
        $sparepart->increment('stok', $detail_servis->qty);

        $detail_servis->delete();

        return redirect()->route('masuk_admin');
    }
}
