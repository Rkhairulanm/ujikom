<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'penjualan_id';

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'detailpenjualans', 'penjualan_id', 'produk_id');
    }
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'pelanggan_id', 'pelanggan_id');
    }
}
