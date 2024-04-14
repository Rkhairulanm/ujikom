<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'pelanggan_id';

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'pelanggan_id', 'pelanggan_id');
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'pelanggan_id', 'pelanggan_id');
    }
}
