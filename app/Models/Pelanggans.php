<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggans extends Model
{
    protected $fillable = ['nama', 'no_hp', 'alamat', 'email'];
    protected $primaryKey = 'id';

    public function servis()
    {
        return $this->hasOne(Servis::class);
    }

    public function nota_pembayaran()
    {
        return $this->hasOne(NotaPembayaran::class);
    }
}
