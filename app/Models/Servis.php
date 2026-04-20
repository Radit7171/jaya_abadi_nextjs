<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $fillable = ['kode_servis', 'pelanggan_id', 'user_id', 'keluhan', 'status', 'tanggal_masuk', 'tanggal_selesai', 'biaya_jaya'];
    protected $primaryKey = 'id';

    public function pelanggan ()
    {
        return $this->belongsTo(Pelanggans::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_servis()
    {
        return $this->hasMany(DetailServis::class);
    }

    public function nota_pembayaran()
    {
        return $this->hasOne(NotaPembayaran::class);
    }
}
