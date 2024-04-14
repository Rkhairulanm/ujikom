<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Struk;
use App\Models\Produk;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $produk = Produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        return view('layouts.barang', [
            'title' => 'Produk',
            'produk' => $produk
        ]);
    }
    public function main()
    {
        $produk = Produk::first();
        $totalStok = Produk::sum('stok');
        $totalHarga = Pembelian::sum('total');
        $totalPemesanan = Struk::count('struk');

        $tanggalAwal = Carbon::now()->startOfMonth();
        $tanggalAkhir = Carbon::now()->endOfMonth();
        $totalPenghasilan = Pembelian::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])
            ->sum('total');

        $totalPenjualanPerProduk = Penjualan::select('produk_id', DB::raw('SUM(stok) as total_penjualan'))
            ->groupBy('produk_id')
            ->orderByDesc('total_penjualan')
            ->get();

        // Ambil ID produk dengan penjualan terbanyak
        $produkTeratas = $totalPenjualanPerProduk->first();

        // Lakukan sesuatu dengan produk teratas (misalnya, tampilkan informasinya)
        if ($produkTeratas) {
            $produkIdTeratas = $produkTeratas->produk_id;
            $totalPenjualanTeratas = $produkTeratas->total_penjualan;
            $produkTeratasInfo = Produk::find($produkIdTeratas);

            //     // Lakukan sesuatu dengan produk teratas (misalnya, tampilkan informasinya)
            //     if ($produkTeratasInfo) {
            //         echo "Produk dengan penjualan terbanyak: " . $produkTeratasInfo->nama_produk . " (Total penjualan: " . $totalPenjualanTeratas . ")";
            //     } else {
            //         echo "Produk tidak ditemukan";
            //     }
            // } else {
            //     echo "Tidak ada data penjualan";
        } else {
            $title = 'Dashboard';
            return view('layouts.dashboard', compact('produk', 'totalStok', 'totalHarga', 'title', 'totalPenghasilan', 'totalPemesanan',));
        }

        $title = 'Dashboard';
        return view('layouts.dashboard', compact('produkTeratasInfo', 'produk', 'totalStok', 'totalHarga', 'title', 'totalPenghasilan', 'totalPemesanan', 'totalPenjualanTeratas'));
    }
    public function create()
    {
        return view('form_produk.add_barang', [
            'title' => 'Produk'
        ]);
    }
    public function store(Request $request)
    {
        $newName = '';
        if ($request->hasFile('image')) {
            $newName = $request->nama_produk . '-' . now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('image', $newName); // Simpan gambar ke direktori penyimpanan yang sudah dikonfigurasi dalam filesystems.php
        }

        $data = $request->all();
        $data['image'] = $newName; // Tambahkan nama file gambar ke data yang akan disimpan ke database
        $produk = Produk::create($data);

        if ($produk) {
            Session::flash('status', 'success');
            Session::flash('message', 'Produk Added Successfully');
        }

        return redirect('/add-produk');
    }

    public function edit($produk_id)
    {
        $produk = Produk::findOrFail($produk_id);
        return view('form_produk.edit_barang', [
            'title' => 'Produk',
            'produk' => $produk
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $produk = Produk::find($id);
        $produk->update($data);
        Session::flash('status', 'success');
        Session::flash('message', 'Produk Updated Successfully');
        return redirect('/barang');
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->detailPenjualans()->delete();
        $produk->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Produk Deleted Successfully');

        return redirect('/barang');
    }
}
