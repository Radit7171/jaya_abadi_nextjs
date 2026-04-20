<?php

namespace App\Http\Controllers;

use App\Models\DetailServis;
use App\Models\NotaPembayaran;
use App\Models\Pelanggans;
use App\Models\Servis;
use App\Models\Spareparts;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function masuk_dashboard()
    {
        if (!session('user_id') || session('role') != 'admin') {
            return redirect('login');
        }

        $spareparts = Spareparts::all();
        $pelanggans = Pelanggans::all();
        $users = User::all();
        $serviss = Servis::with(['pelanggan', 'user'])->get();
        $detail_serviss = DetailServis::with(['servis', 'sparepart'])->get();
        $nota_pembayarans = NotaPembayaran::with(['servis', 'pelanggan'])->get();

        return view('admin.dashboard_admin', compact('spareparts', 'pelanggans', 'users', 'serviss', 'detail_serviss', 'nota_pembayarans'));
    }
}
