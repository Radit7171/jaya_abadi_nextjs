<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function tampil_tambah()
    {
        return view('crud_user.tambah');
    }

    public function aksi_tambah(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('masuk_admin');
    }

    public function tampil_edit($id)
    {
        $user = User::findorfail($id);
        return view('crud_user.edit', compact('user'));
    }

    public function aksi_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'nullable'
        ]);

        $user = User::findorfail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        if (!empty($request->password)){
            $data ['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('masuk_admin');
    }

    public function aksi_hapus($id)
    {
        $user = User::findorfail($id);

        $user->delete();

        return redirect()->route('masuk_admin');
    }
}
