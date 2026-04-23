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

    protected $casts = [
        'tanggal_bayar' => 'date',
    ];

    public function servis()
    {
        return $this->belongsTo(Servis::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggans::class);
    }

    public function isGaransiValid($jenis)
    {
        if ($jenis == 'servis') {
            return now() <= $this->tanggal_bayar->copy()->addDays(30);
        } elseif ($jenis == 'sparepart') {
            return now() <= $this->tanggal_bayar->copy()->addYear();
        }
        return false;
    }

    public function getGaransiEndDate($jenis)
    {
        if ($jenis == 'servis') {
            return $this->tanggal_bayar->copy()->addDays(30);
        } elseif ($jenis == 'sparepart') {
            return $this->tanggal_bayar->copy()->addYear();
        }
        return null;
    }
}
