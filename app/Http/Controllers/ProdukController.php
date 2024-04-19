<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Struk;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $produk = Produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $struk = Struk::get();


        return view('layouts.barang', [
            'title' => 'Produk',
            'produk' => $produk,
            'struk' => $struk,

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

        $jumlahKasbon = Pembelian::whereNull('pembayaran')->count();

        // Hitung jumlah yang belum lunas dari database
        $jumlahBelumLunas = Pembelian::where('pembayaran', '!=', null)
            ->whereColumn('total', '>', 'pembayaran')
            ->count();

        // Hitung jumlah yang sudah lunas dari database
        $jumlahLunas = Pembelian::where('pembayaran', '!=', null)
            ->whereColumn('total', '=', 'pembayaran')
            ->count();

        $totalKasbonBelumLunasi = Pembelian::whereNull('pembayaran')->sum('total');


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
        return view('layouts.dashboard', compact('produkTeratasInfo', 'produk', 'totalStok', 'totalHarga', 'title', 'totalPenghasilan', 'totalPemesanan', 'totalPenjualanTeratas', 'totalKasbonBelumLunasi', 'jumlahKasbon', 'jumlahBelumLunas', 'jumlahLunas'));
    }
    public function create()
    {
        $kategori = Kategori::get();
        return view('form_produk.add_barang', [
            'title' => 'Produk',
            'kategori' => $kategori
        ]);
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        $newName = '';
        // Periksa apakah file gambar berhasil diunggah
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $newName = $request->nama_produk . '-' . now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('image', $newName);
            // dd($newName);
        }

        $data = $request->all();
        $data['image'] = $newName;

        // Jika kategori_id adalah 'new', buat kategori baru
        if ($request->kategori_id == 'new') {
            $newCategory = Kategori::create(['kategori' => $request->new_category]);
            $data['kategori_id'] = $newCategory->kategori_id;
        }

        // Simpan data produk
        $produk = Produk::create($data);

        if ($produk) {
            // Jika penyimpanan berhasil
            Session::flash('status', 'success');
            Session::flash('message', 'Produk berhasil ditambahkan.');
        } else {
            // Jika penyimpanan gagal
            Session::flash('status', 'error');
            Session::flash('message', 'Gagal menambahkan produk. Silakan coba lagi.');
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
