<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class PembelianController extends Controller
{
    public function index()
    {
        $produk = Produk::with('pembelian')->orderBy('created_at', 'desc')->orderBy('created_at', 'desc')   ->paginate(15);
        return view('layouts.penjualan', [
            'title' => 'Detail Penjualan',
            'produk' => $produk
        ]);
    }
    public function show($id)
    {
        $produk = Produk::with('pembelian.pelanggan')->where('produk_id', $id)->first();
        return view('layouts.pembelian-detail', [
            'title' => 'Detail Penjualan',
            'produk' => $produk
        ]);
    }
    public function kelolaPembelian()
    {
        $pembelian = Pembelian::all();
        return view('layouts.pembelian-kelola', [
            'title' => 'Kelola Pembelian',
            'pembelian' => $pembelian
        ]);
    }
}
