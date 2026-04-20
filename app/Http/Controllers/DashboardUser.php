<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function masuk_dashboard()
    {
        if (!session('user_id') || session('role') != 'user') {
            return redirect('login');
        }
        return view('user.dashboard_user');
    }
}
