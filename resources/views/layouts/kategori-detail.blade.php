@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mb-5">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4 px-3">
                        <div class="card-header pb-0">
                            <h4 class="text-center">Detail Pembelian</h4>
                            <hr class="bg-dark px-auto">
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <!-- Informasi Pembelian -->
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <div class="info">
                                <div class="info-item">
                                    <h4>
                                        <span class="info-label">Nama Kategori : </span>
                                        <span class="info-value"><u>{{ $kategori->kategori }}</u></span>
                                    </h4>
                                </div>
                            </div>

                            <!-- Tabel Detail Pembelian -->
                            <div class="table-responsive pt-2">
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Produk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori->produk as $k)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('/storage/image/' . $k->image) }}" class="card-img"
                                                        style="object-fit: cover;max-width: 100px; max-height: 100px;"
                                                        alt="...">
                                                </td>
                                                <td>{{ $k->nama_produk }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="card-footer mb-1">
                            <a href="/kategori" class="btn btn-secondary">Back</a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </main>
@endsection
