@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="">Tambah Produk</h4>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body px-0 pt-0 pb-2 ps-4 me-4">
                            <form method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="hidden" class="form-control" name="produk_id" id="produk_id" value="{{ $produk->produk_id }}">
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label text-sm">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label text-sm">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga" value="{{ $produk->harga }}">
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label text-sm">Stok</label>
                                    <input type="number" class="form-control" name="stok" id="stok" value="{{ $produk->stok }}">
                                </div>
                                <a href="/barang" class="btn bg-gradient-danger ">Back</a>
                                <button type="submit" class="btn btn-custom float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
