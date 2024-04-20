@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="">Logs Penjualan</h4>
                                </div>
                                <form action="" method="get">
                                    <div class="pe-md-3 d-flex align-items-center float-end">
                                        <div class="input-group">
                                            <span style="max-height: 42px" class="input-group-text text-body"><i
                                                    class="fas fa-search" aria-hidden="true"></i></span>
                                            <input style="max-height: 42px;" type="text" class="form-control"
                                                placeholder="Masukan Nama Produk" name="keyword">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <hr class="bg-dark px-auto">
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Keterangan</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Nama Produk</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Nama Pelanggan
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Stock</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Total Harga</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Tanggal Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $k)
                                            <tr class="ps-2">
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $loop->iteration }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $k->keterangan }}</h6>
                                                    </div>
                                                </td>
                                                @foreach ($k->produk as $item)
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                                {{ $item->nama_produk ?? '-' }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                @endforeach

                                                @if ($k->produk->isEmpty())
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                                -
                                                            </h6>
                                                        </div>
                                                    </td>
                                                @endif

                                                @foreach ($k->pelanggan as $s)
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                                {{ $s->nama_pelanggan ?? '-' }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                @endforeach

                                                @if ($k->pelanggan->isEmpty())
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                                -
                                                            </h6>
                                                        </div>
                                                    </td>
                                                @endif

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->stok }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->total_harga }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->created_at }}
                                                        </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mx-3">{{ $logs->withQueryString()->links() }}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
