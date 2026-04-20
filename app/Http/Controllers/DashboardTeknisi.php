<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTeknisi extends Controller
{
    public function masuk_dashboard()
    {
        if (!session('user_id') || session('role') != 'teknisi') {
            return redirect('login');
        }
        return view('teknisi.dashboard_teknisi');
    }
}
