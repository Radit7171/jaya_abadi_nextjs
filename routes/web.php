<?php

use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardTeknisi;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\DetailServisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotaPembayaranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [LoginController::class, 'masuk_login'])->name('login');

Route::get('/register', [RegisterController::class, 'masuk_register'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('aksi_register');

Route::post('/login', [LoginController::class, 'login'])->name('aksi_login');

Route::get('/admin', [DashboardAdmin::class, 'masuk_dashboard'])->name('masuk_admin');

Route::get('/teknisi', [DashboardTeknisi::class, 'masuk_dashboard'])->name('masuk_teknisi');

Route::get('/user', [DashboardUser::class, 'masuk_dashboard'])->name('masuk_user');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/sparepart/tambah', [SparepartController::class, 'tampil_tambah'])->name('tampil_tambah_sparepart');

Route::post('/sparepart/tambah', [SparepartController::class, 'aksi_tambah'])->name('aksi_tambah');

Route::get('/sparepart/edit/{id}', [SparepartController::class, 'tampil_edit'])->name('tampil_edit');

Route::put('/sparepart/edit/{id}', [SparepartController::class, 'aksi_edit'])->name('aksi_edit');

Route::get('/sparepart/hapus/{id}', [SparepartController::class, 'aksi_hapus'])->name('aksi_hapus');

Route::get('/pelanggan/tambah', [PelangganController::class, 'tampil_tambah'])->name('tampil_tambah_pelanggan');

Route::post('/pelanggan/tambah', [PelangganController::class, 'aksi_tambah'])->name('aksi_tambah_pelanggan');

Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'tampil_edit'])->name('tampil_edit_pelanggan');

Route::put('/pelanggan/edit/{id}', [PelangganController::class, 'aksi_edit'])->name('aksi_edit_pelanggan');

Route::get('/pelanggan/hapus/{id}', [PelangganController::class, 'aksi_hapus'])->name('aksi_hapus_pelanggan');

Route::get('/user_crud/tambah', [UserController::class, 'tampil_tambah'])->name('tampil_tambah_user_crud');

Route::post('/user_crud/tambah', [UserController::class, 'aksi_tambah'])->name('aksi_tambah_user_crud');

Route::get('/user_crud/edit/{id}', [UserController::class, 'tampil_edit'])->name('tampil_edit_user_crud');

Route::put('/user_crud/edit/{id}', [UserController::class, 'aksi_edit'])->name('aksi_edit_user_crud');

Route::get('/user_crud/hapus/{id}', [UserController::class, 'aksi_hapus'])->name('aksi_hapus_user_crud');

Route::get('/servis/tambah', [ServisController::class, 'tampil_tambah'])->name('tampil_tambah_servis');

Route::post('/servis/tambah', [ServisController::class, 'aksi_tambah'])->name('aksi_tambah_servis');

Route::get('/servis/edit/{id}', [ServisController::class, 'tampil_edit'])->name('tampil_edit_servis');

Route::put('/servis/edit/{id}', [ServisController::class, 'aksi_edit'])->name('aksi_edit_servis');

Route::get('/servis/hapus/{id}', [ServisController::class, 'aksi_hapus'])->name('aksi_hapus_servis');

Route::get('/detail_servis/tambah', [DetailServisController::class, 'tampil_tambah'])->name('tampil_tambah_detail_servis');

Route::post('/detail_servis/tambah', [DetailServisController::class, 'aksi_tambah'])->name('aksi_tambah_detail_servis');

Route::get('/detail_servis/edit/{id}', [DetailServisController::class, 'tampil_edit'])->name('tampil_edit_detail_servis');

Route::put('/detail_servis/edit/{id}', [DetailServisController::class, 'aksi_edit'])->name('aksi_edit_detail_servis');

Route::get('/detail_servis/hapus/{id}', [DetailServisController::class, 'aksi_hapus'])->name('aksi_hapus_detail_servis');

Route::get('/nota/tambah', [NotaPembayaranController::class, 'tampil_tambah'])->name('tampil_tambah_nota');

Route::post('/nota/tambah', [NotaPembayaranController::class, 'aksi_tambah'])->name('aksi_tambah_nota');

Route::get('/nota/edit/{id}', [NotaPembayaranController::class, 'tampil_edit'])->name('tampil_edit_nota');

Route::put('/nota/edit/{id}', [NotaPembayaranController::class, 'aksi_edit'])->name('aksi_edit_nota');

Route::get('/nota/hapus/{id}', [NotaPembayaranController::class, 'aksi_hapus'])->name('aksi_hapus_nota');

Route::get('/nota/cetak/{id}', [NotaPembayaranController::class, 'cetak_nota'])->name('cetak_nota');
