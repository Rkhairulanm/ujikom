<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class LogController extends Controller
{


    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $logs = Penjualan::query()
            ->whereHas('produk', function ($query) use ($keyword) {
                $query->where('nama_produk', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhere('keterangan', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('pelanggan', function ($query) use ($keyword) {
                $query->where('nama_pelanggan', 'LIKE', '%' . $keyword . '%');
            })
            ->with(['pelanggan', 'produk'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $title = 'Logs';
        return view('layouts.log', compact('title', 'logs', 'keyword'));
    }
}
