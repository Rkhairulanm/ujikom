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
                                    <h4 class="">Pendataan Barang</h4>
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
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <a href="/add-produk">
                                    <div class="mt-2 text-white btn bg-gradient-success">Tambah Produk</div>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Foto</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Nama Produk</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Harga</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Stock</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Status</th>
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
                                                        <h6 class="ps-2 text-secondary text-sm font-weight-bold">
                                                            {{ $k->nama_produk }}</h6>
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
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->harga }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->stok }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            @if ($k->stok <= 0)
                                                                <span class="badge badge-sm bg-gradient-danger">Habis</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-sm bg-gradient-success">Tersedia</span>
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/edit-produk/{{ $k->produk_id }}"><span
                                                            class="btn bg-gradient-warning">Edit</span></a>
                                                    <a href="/delete-produk/{{ $k->produk_id }}"
                                                        onclick="return confirm('Are You sure you want to Delete this product?')"><span
                                                            class="btn bg-gradient-danger ">Hapus</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mx-3">{{ $produk->withQueryString()->links() }}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
