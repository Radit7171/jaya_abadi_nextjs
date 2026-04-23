<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use App\Models\Spareparts;
use Illuminate\Http\Request;

class DashboardTeknisi extends Controller
{
    public function masuk_dashboard()
    {
        if (!session('user_id') || session('role') != 'teknisi') {
            return redirect('login');
        }

        $serviss = Servis::with(['pelanggan', 'user'])->where('user_id', session('user_id'))->get();
        $spareparts = Spareparts::all();

        return view('teknisi.dashboard_teknisi', compact('serviss', 'spareparts'));
    }
}
