@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="text-center">Detail Pembelian</h4>
                            <hr class="bg-dark px-auto">
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('/storage/image/' . $produk->image) }}"
                                        class="ms-3 img-fluid rounded" alt="Gambar Produk">
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-sm align-items-center mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-uppercase text-dark text-sm font-weight-bolder">Produk</th>
                                                <td>{{ $produk->nama_produk }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-uppercase text-dark text-sm font-weight-bolder">Jumlah
                                                    Pembelian</th>
                                                <td>{{ $produk->pembelian->sum('jumlah') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-uppercase text-dark text-sm font-weight-bolder">Sub Total
                                                </th>
                                                <td>{{ $produk->pembelian->sum('total') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="table-responsive pt-2">
                                        <table class="table table-striped table-bordered table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama Pelanggan</th>
                                                    <th scope="col">Jumlah Pembelian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($produk->pembelian as $pembelian)
                                                    <tr>
                                                        <td>{{ $pembelian->pelanggan->nama_pelanggan }}</td>
                                                        <td>{{ $pembelian->jumlah }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </main>
@endsection
