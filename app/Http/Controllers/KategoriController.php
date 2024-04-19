<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::with('produk')->get();
        $title = 'Kelola Kategori';
        return view('layouts.kategori', compact('kategori', 'title'));
    }
    public function show($id)
    {
        $kategori = Kategori::with('produk')->where('kategori_id', $id)->first();
        $title = 'Kelola Kategori';
        $produk = $kategori->produk();
        return view('layouts.kategori-detail', compact('kategori', 'title', 'produk'));
    }
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        // Periksa apakah kategori memiliki produk terkait
        if ($kategori->produk()->exists()) {
            Session::flash('status', 'error');
            Session::flash('message', 'Gagal menghapus kategori. Kategori tersebut masih terkait dengan beberapa produk.');
        } else {
            $kategori->delete();

            Session::flash('status', 'success');
            Session::flash('message', 'Kategori berhasil dihapus.');
        }

        return redirect('/kategori');
    }

    public function create()
    {
        $title = 'Kelola Kategori';
        return view('layouts.kategori-create', compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255', // Sesuaikan dengan aturan validasi Anda
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Buat instance baru dari model Kategori
        $kategori = new Kategori();
        $kategori->kategori = $request->kategori; // Sesuaikan dengan nama kolom di database

        // Simpan data ke dalam database
        $saved = $kategori->save();

        if ($saved) {
            // Jika penyimpanan berhasil
            Session::flash('status', 'success');
            Session::flash('message', 'Kategori berhasil ditambahkan.');
        } else {
            // Jika penyimpanan gagal
            Session::flash('status', 'error');
            Session::flash('message', 'Gagal menambahkan kategori. Silakan coba lagi.');
        }

        // Redirect kembali ke halaman kategori
        return view('layouts.kategori', compact('title', 'kategori'));
    }
}
