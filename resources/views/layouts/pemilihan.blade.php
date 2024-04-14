@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Built by developers</p>
                                    <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                                    <p class="mb-5">From colors, cards, typography to complex elements, you will find the
                                        full documentation.</p>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative z-index-2 pt-4"
                                            src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                        style="background-image: url('../assets/img/ivancik.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
                            <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is all
                                about who take the opportunity first.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h4 class="text-center">Pembelian Barang</h4>
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
                                    <div class="mb-3">
                                        <label for="nama_pelanggan" class="form-label text-sm">Nama Pelanggan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $penjualan->pelanggan->nama_pelanggan }}" name="nama_pelanggan"
                                            id="nama_pelanggan">
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="font-weight-bold text-sm">Detail Pembeli</h4>
                                        <ul class="text-decoration-none">
                                            <li><h5 class="text-sm ">Alamat : {{ $penjualan->pelanggan->alamat }}</h5>
                                            <li><h5 class="text-sm ">No Telpon : {{ $penjualan->pelanggan->telpon }}</h5>
                                        </ul>

                                    </div>
                                    <div class="mb-3">
                                        <label for="produk" class="form-label text-sm">Produk</label>
                                        <select class="form-select" name="produk" id="produk">
                                            @if ($produk->detailpenjualan)
                                                @foreach ($produk->detailpenjualan->produk as $produk)
                                                    <option value="{{ $produk->produk_id }}">{{ $produk->nama_produk }}</option>
                                                @endforeach
                                            @else
                                                <option value="">Tidak ada produk tersedia</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telpon" class="form-label text-sm">No Telpon</label>
                                        <input type="number" class="form-control" name="telpon" id="telpon">
                                    </div>
                                    <button type="submit" class="btn btn-custom">Submit</button>
                                    <a href="/pembelian" class="btn bg-gradient-danger float-end">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
