<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function masuk_login()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            session([
                'user_id' => $user->id,
                'name' => $user->name,
                'role' => $user->role
            ]);

            if ($user->role == 'admin') {
                return redirect('/admin');
            }
            elseif ($user->role == 'teknisi') {
                return redirect('/teknisi');
            }
            else {
                return redirect('/user');
            }

            return back()->withErrors('error', 'Gagal Login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('welcome');
    }
}
