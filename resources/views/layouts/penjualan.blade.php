@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="">Pendataan Penjualan</h4>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Gambar
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Nama Produk
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Jumlah
                                                Pembelian</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Sub Total</th>

                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $k)
                                            <tr class="ps-2">
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $loop->iteration }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <img src="{{ asset('/storage/image/' . $k->image) }}"
                                                            class="card-img"
                                                            style="object-fit: cover;max-width: 100px; max-height: 100px;"
                                                            alt="...">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $k->nama_produk }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->pembelian->sum('jumlah') }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->pembelian->sum('total') }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/detail-penjualan/{{ $k->produk_id }}"><span
                                                            class="btn bg-gradient-info mx-2">Detail</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mx-2">{{ $produk->withQueryString()->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
