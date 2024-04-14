<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use App\Models\Produk;
use Barryvdh\DomPDF\PDF;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $pelanggan = Pelanggan::where('nama_pelanggan', 'LIKE', '%' . $keyword . '%')
            ->get()->all();
        return view('layouts.pelanggan', [
            'title' => 'Pelanggan',
            'pelanggan' => $pelanggan
        ]);
    }
    public function create(Request $request)
    {
        // Melupakan session pembelian jika sudah ada
        $request->session()->forget('pembelian_data');

        $produk = Produk::get();
        return view('layouts.pembelian', [
            'title' => 'Pembelian',
            'produk' => $produk,
        ]);
    }

    public function proses(Request $request)
    {
        $validated = $request->validate([
            'produk' => 'required'
        ]);

        $produkData = [];

        // Ambil hanya produk yang dicentang beserta jumlahnya
        foreach ($request->produk as $produkId => $data) {
            if (isset($data['checked'])) {
                $produkData[$produkId]['produk'] = Produk::find($produkId);
                $produkData[$produkId]['jumlah'] = $data['jumlah'];
            }
        }

        // Simpan data dalam session
        session(['produk_data' => $produkData]);
        session(['data' => $request->all()]);

        return redirect('/pembelian/verifikasi');
    }
    public function lanjutan()
    {
        $produkData = session('produk_data');
        $data = session('data');

        session(['produk_data' => $produkData]);
        session(['data' => $data]);

        return view('layouts.proses', [
            'title' => 'Pembelian',
            'data' => $data,
            'produk_data' => $produkData
        ]);
    }
    public function finalisasi(Request $request)
    {
        if ($request->session()->has('pembelian_selesai')) {
            return redirect('/pembelian/forget');
        }

        $request->validate([
            'nama_pelanggan' => 'required|string',
        ]);

        $produkData = session('produk_data');

        $pembelianDetails = [];
        $totalHargaKeseluruhan = 0;

        $pelangganData = [
            'nama_pelanggan' => $request->nama_pelanggan,
        ];

        if ($request->alamat && $request->telpon) {
            $pelangganData['alamat'] = $request->alamat;
            $pelangganData['telpon'] = $request->telpon;
        }

        $pelanggan = Pelanggan::create($pelangganData);

        $nomorStruk = '#INV-' . date('Y') . '-' . date('m') . '-' . date('d');
        $struk = Struk::create([
            'struk' => $nomorStruk,
        ]);

        $noStruk = $struk->struk;
        foreach ($produkData as $produkId => $data) {
            $produk = Produk::find($produkId);

            $namaProduk = $produk->nama_produk;

            if ($produk->stok < $data['jumlah']) {
                return redirect()->back()->withErrors(['Stok ' . $produk->nama_produk . ' tidak mencukupi.']);
            }

            $totalHarga = $data['jumlah'] * $produk->harga;
            $totalHargaKeseluruhan += $totalHarga;


            $pembelianDetails[] = [
                'nama_produk' => $produk->nama_produk,
                'jumlah' => $data['jumlah'],
                'harga' => $produk->harga,
                'total' => $totalHarga,
            ];

            $pembelian = Pembelian::create([
                'produk_id' => $produkId,
                'pelanggan_id' => $pelanggan->pelanggan_id,
                'jumlah' => $data['jumlah'],
                'total' => $totalHarga,
                'pembayaran' => $request->pembayaran,
                'keterangan' => $pelanggan->nama_pelanggan . '-' . $pelanggan->telpon . '-' . now(),
                'struk_id' => $struk->struk_id,
            ]);
        }
        $now = now();

        $keterangan = 'Ditambahkan oleh ';
        $keterangan .= $pelanggan->nama_pelanggan . ', ';
        $keterangan .= $pelanggan->nomor_telepon . ' pada ';
        $keterangan .= $now->format('Y-m-d H:i:s');
        $produk->stok -= $data['jumlah'];
        $produk->save();


        $penjualan = Penjualan::create([
            'keterangan' => $keterangan,
            'produk_id' => $produkId,
            'pelanggan_id' => $pelanggan->pelanggan_id,
            'stok' => $data['jumlah'],
            'total_harga' => $totalHarga,
        ]);

        DetailPenjualan::create([
            'jumlah' => $data['jumlah'],
            'sub_total' => $totalHarga,
            'penjualan_id' => $penjualan->penjualan_id,
            'produk_id' => $produkId,
        ]);
        // dd($struk);
        $request->session()->put('pembelian_selesai', true);
        session(['total_harga' => $totalHargaKeseluruhan]);

        $title = 'Struk';

        $struk = Struk::with(['pembelian.pelanggan'])->first();

        $currentTime = $struk->created_at->format('Y-m-d H:i:s');


        $bayar = $pembelian->pembayaran;

        $dataPrint = [
            'noStruk' => $noStruk,
            'pelanggan' => $pelanggan,
            'pembelianDetails' => $pembelianDetails,
            'totalHargaKeseluruhan' => $totalHargaKeseluruhan,
            'title' => $title,
            'currentTime' => $currentTime,
            'struk' => $struk,
            'bayar' => $bayar,
            'namaProduk' => $namaProduk,
        ];

        $request->session()->put('data_print', $dataPrint);

        return view('layouts.struk.print', compact('noStruk', 'pelanggan', 'pembelianDetails', 'totalHargaKeseluruhan', 'title', 'currentTime', 'struk', 'bayar', 'namaProduk'));
    }

    public function downloadStruk(Request $request)
    {
        $dataPrint = session('data_print');
        $noStruk = $dataPrint['noStruk'];
        $pdf = app('dompdf.wrapper')->loadView('layouts.struk.printed', $dataPrint)->setOptions(['defaultFont' => 'sans-serif']);

        $filename = 'struk_' . $noStruk . '.pdf';

        return $pdf->download($filename);
    }
    public function forgetSession(Request $request)
    {
        // Melupakan session pembelian
        $request->session()->forget('produk_data');
        $request->session()->forget('pembelian_selesai');

        // Redirect kembali ke halaman pembelian
        return redirect('/pembelian');
    }

    public function history(Request $request)
    {
        $keyword = $request->keyword;
        $struk = Struk::with(['pembelian.pelanggan'])
            ->where('struk', 'LIKE', '%' . $keyword . '%')
            ->get();
        $title = 'Transaksi';
        $now = now();
        $currentTime = $now->format('Y-m-d');
        return view('layouts.history', compact('struk', 'title', 'currentTime'));
    }

    public function showHistory($id)
    {
        $struk = Struk::with(['pembelian.pelanggan'])->findOrFail($id);
        $title = 'History';

        if ($struk) {
            $totalHargaKeseluruhan = 0;
            $pembelianDetails = []; // Inisialisasi array untuk menyimpan detail pembelian

            foreach ($struk->pembelian as $item) {
                $produk = Produk::findOrFail($item->produk_id);
                $hargaProduk = $produk->harga;
                $totalHargaItem = $item->jumlah * $hargaProduk;
                $totalHargaKeseluruhan += $totalHargaItem;

                // Tambahkan detail pembelian beserta nama produk ke dalam array pembelianDetails
                $pembelianDetails[] = [
                    'nama_produk' => $produk->nama_produk,
                    'jumlah' => $item->jumlah,
                    'harga' => $hargaProduk,
                    'total' => $totalHargaItem,
                ];
            }

            $noStruk = $struk->struk;
            $pelanggan = $struk->pembelian->first()->pelanggan;
            $title = 'Struk';
            $currentTime = $struk->created_at->format('Y-m-d H:i:s');
            $bayar = $struk->pembelian->first()->pembayaran;

            $dataPrint = [
                'noStruk' => $noStruk,
                'pelanggan' => $pelanggan,
                'pembelianDetails' => $pembelianDetails,
                'totalHargaKeseluruhan' => $totalHargaKeseluruhan,
                'title' => $title,
                'currentTime' => $currentTime,
                'struk' => $struk,
                'bayar' => $bayar,
            ];
            return view('layouts.struk.print', $dataPrint);
        } else {
            return response()->json(['message' => 'Struk not found'], 404);
        }
    }



    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        // Ambil semua pembelian yang terkait dengan pelanggan
        $pembelians = Pembelian::where('pelanggan_id', $id)->get();

        // Iterasi setiap pembelian
        foreach ($pembelians as $pembelian) {
            // Cek apakah pembelian memiliki struk terkait
            if ($pembelian->struk) {
                // Hapus pembelian terlebih dahulu agar tidak ada ketergantungan
                $pembelian->delete();

                $struk_id = $pembelian->struk_id;

                // Hapus struk berdasarkan struk_id
                Struk::where('struk_id', $struk_id)->delete();
            }
        }

        // Hapus semua penjualan terkait dengan pelanggan
        $pelanggan->penjualans()->delete();

        // Hapus pelanggan setelah semua pembelian dan penjualan dihapus
        $pelanggan->delete();

        Session::flash('status', 'danger');
        Session::flash('message', 'Pelanggan Deleted Successfully');
        return redirect('/pelanggan');
    }

    public function pemilihan($id)
    {
        $penjualan = Penjualan::with(['pelanggan', 'detailpenjualan.produk'])->findOrFail($id);
        $produk = Penjualan::with(['detailpenjualan.produk'])->first();
        $title = 'Pembelian';
        return view('layouts.pemilihan', compact('title', 'penjualan', 'produk'));
    }
}
