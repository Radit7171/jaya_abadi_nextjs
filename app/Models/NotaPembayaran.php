<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaPembayaran extends Model
{
    protected $fillable = [
        'kode_nota',
        'servis_id',
        'pelanggan_id',
        'total_jasa',
        'total_sparepart',
        'grand_total',
        'tanggal_bayar',
        'status_bayar' // belum, sudah
    ];

    protected $primaryKey = 'id';

    public function servis()
    {
        return $this->belongsTo(Servis::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggans::class);
    }
}
