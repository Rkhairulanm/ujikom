<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $primaryKey = 'pembelian_id';
    protected $fillable = ['pelanggan_id', 'produk_id', 'jumlah', 'total', 'keterangan', 'pembayaran', 'struk_id'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'produk_id', 'produk_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'pelanggan_id');
    }
    public function struk()
    {
        return $this->belongsTo(Struk::class, 'struk_id', 'struk_id');
    }
}
