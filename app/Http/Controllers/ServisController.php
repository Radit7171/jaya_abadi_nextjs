<?php

namespace App\Http\Controllers;

use App\Models\Pelanggans;
use App\Models\Servis;
use App\Models\User;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function tampil_tambah()
    {
        $pelanggans = Pelanggans::all();
        $users = User::all();
        $kode_servis = 'SRV -' . date('Ymd') . '-' . rand(1000, 9999);
        return view('servis.tambah', compact('pelanggans', 'users' , 'kode_servis'));
    }

    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'kode_servis' => 'required',
            'pelanggan_id' => 'required',
            'user_id' => 'required',
            'keluhan' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_selesai' => 'required',
            'biaya_jaya' => 'required'
        ]);

        Servis::create($request->all());

        return redirect()->route('masuk_admin');
    }

    public function tampil_edit($id)
    {
        $servis = Servis::findorfail($id);
        $pelanggans = Pelanggans::all();
        $users = User::all();
        return view('servis.edit', compact('servis', 'pelanggans', 'users'));
    }

    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'kode_servis' => 'required',
            'pelanggan_id' => 'required',
            'user_id' => 'required',
            'keluhan' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_selesai' => 'required',
            'biaya_jaya' => 'required'
        ]);

        $servis = Servis::findorfail($id);

        $servis->update($request->all());

        return redirect()->route('masuk_admin');
    }

    public function aksi_hapus($id)
    {
        $servis = Servis::findorfail($id);
        $servis->delete();
        return redirect()->route('masuk_admin');
    }
}
