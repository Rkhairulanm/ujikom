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
                            <form method="POST" enctype="multipart/form-data">
                                @csrf                                <div class="mb-3">
                                    <label for="produk" class="form-label text-sm">Produk</label>
                                    <select class="form-select" name="produk" id="produk" required>
                                        <option value="">Pilih Produk</option>
                                        @foreach($produk as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_produk }}, Stok : <span class="float-end">{{ $k->stok }}</span></option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label text-sm">Jumlah</label>
                                    <input type="number" class="form-control" name="stok" id="stok" required>
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
