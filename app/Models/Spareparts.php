<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spareparts extends Model
{
    protected $fillable = ['sku', 'nama_part', 'merk', 'tipe_laptop', 'harga_beli', 'harga_jual', 'stok'];
    protected $primaryKey = 'id';

    public function detail_servis()
    {
        return $this->hasMany('detail_servis');
    }
}
