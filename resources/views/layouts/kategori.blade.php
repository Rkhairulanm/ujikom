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
                                    <h4 class="">Pendataan Pelanggan</h4>
                                </div>
                                <form action="" method="get">
                                    <div class="pe-md-3 d-flex align-items-center float-end">
                                        <div class="input-group">
                                            <span style="max-height: 42px" class="input-group-text text-body"><i
                                                    class="fas fa-search" aria-hidden="true"></i></span>
                                            <input style="max-height: 42px;" type="text" class="form-control"
                                                placeholder="Masukan Nama Pelanggan" name="keyword">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                @if (Session::get('status') === 'success')
                                    <div class="alert alert-success opacity-7 alert-dismissible fade show text-white"
                                        role="alert">
                                        <div class="d-flex justify-content-between">
                                            <div>{{ Session::get('message') }}</div>
                                            <button type="button" class="btn-close pb-2 text-white" data-bs-dismiss="alert"
                                                aria-label="Close">X</button>
                                        </div>
                                    </div>
                                @elseif (Session::get('status') === 'error')
                                    <div class="alert alert-danger opacity-7 alert-dismissible fade show text-white"
                                        role="alert">
                                        <div class="d-flex justify-content-between">
                                            <div>{{ Session::get('message') }}</div>
                                            <button type="button" class="btn-close pb-2 text-white" data-bs-dismiss="alert"
                                                aria-label="Close">X</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning opacity-7 alert-dismissible fade show text-white"
                                        role="alert">
                                        <div class="d-flex justify-content-between">
                                            <div>{{ Session::get('message') }}</div>
                                            <button type="button" class="btn-close pb-2 text-white" data-bs-dismiss="alert"
                                                aria-label="Close">X</button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            {{-- <div class="d-flex justify-content-between">
                                <a href="/kategori-tambah">
                                    <div class="mt-2 text-white btn bg-gradient-success">Tambah Kategori</div>
                                </a>
                            </div> --}}
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Kategori
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Jumlah Barang
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $k)
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
                                                            {{ $k->kategori }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->produk->count('kategori_id') }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/kategori-detail/{{ $k->kategori_id }}"><span
                                                            class="btn bg-gradient-info mx-2">Detail</span></a>
                                                    <a href="/kategori-hapus/{{ $k->kategori_id }}"
                                                        onclick="return confirm('Are You sure you want to Delete this product?')"><span
                                                            class="btn bg-gradient-danger ">Hapus</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
