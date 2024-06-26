@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning opacity-7 alert-dismissible fade show text-white" role="alert">
                        <div class="d-flex justify-content-between">
                            <div>Penghapusan data pelanggan akan secara otomatis menghapus struk pembelian</div>
                            <button type="button" class="btn-close pb-2 text-white" data-bs-dismiss="alert"
                                aria-label="Close">X</button>
                        </div>
                    </div>
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
                                <div class="alert alert-success opacity-7 alert-dismissible fade show text-white"
                                    role="alert">
                                    <div class="d-flex justify-content-between">
                                        <div>{{ Session::get('message') }}</div>
                                        <button type="button" class="btn-close pb-2 text-white" data-bs-dismiss="alert"
                                            aria-label="Close">X</button>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">No</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder">Nama Pelanggan
                                            </th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Alamat</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                No Telpon</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">
                                                Status</th>
                                            <th class="text-uppercase text-dark text-sm font-weight-bolder ">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelanggan as $k)
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
                                                            {{ $k->nama_pelanggan }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->alamat }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            {{ $k->telpon }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="text-secondary text-sm font-weight-bold ps-2">
                                                            @php
                                                                $kasbon = false;
                                                                $totalPembelian = $k->pembelian->sum('total');
                                                                $totalPembayaran = $k->pembelian->sum('pembayaran');
                                                                if (
                                                                    $totalPembayaran < $totalPembelian &&
                                                                    $totalPembayaran != 0
                                                                ) {
                                                                    echo '<span class="badge badge-sm bg-gradient-warning">Belum Lunas</span>';
                                                                } else {
                                                                    foreach ($k->pembelian as $pembelian) {
                                                                        if ($pembelian->pembayaran === null) {
                                                                            $kasbon = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                    if ($kasbon) {
                                                                        echo '<span class="badge badge-sm bg-gradient-danger">Kasbon</span>';
                                                                    } else {
                                                                        echo '<span class="badge badge-sm bg-gradient-success">Lunas</span>';
                                                                    }
                                                                }
                                                            @endphp
                                                        </h6>
                                                    </div>
                                                </td>



                                                <td class="align-middle">
                                                    <a href="/detail-pelanggan/{{ $k->pelanggan_id }}"><span
                                                            class="btn bg-gradient-info mx-2">Detail</span></a>
                                                    <a href="/delete-pelangan/{{ $k->pelanggan_id }}"
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
