<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'produk_id';
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'image',
        'kategori_id'
    ];

    public function penjualan()
    {
        return $this->belongsToMany(Penjualan::class, 'detailpenjualans', 'produk_id', 'penjualan_id');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'produk_id', 'produk_id');
    }

    public function struk()
    {
        return $this->belongsTo(Struk::class, 'struk_id', 'struk_id');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'produk_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
}
