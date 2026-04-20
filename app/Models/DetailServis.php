<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailServis extends Model
{
    protected $fillable = [
        'servis_id',
        'sparepart_id',
        'qty',
        'harga_jual_saat_ini',
        'subtotal'
    ];

    protected $primaryKey = 'id';

    public function servis()
    {
        return $this->belongsTo(Servis::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Spareparts::class);
    }
}
