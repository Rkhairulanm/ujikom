<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'produk_id', 'produk_id');
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }

    protected $table = 'detailpenjualans';
}
