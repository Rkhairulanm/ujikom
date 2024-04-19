@extends('main')

@section('content')
    <div class="container-fluid py-4">
        {{-- @foreach ($produk as $item) --}}
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Penghasilan Bulan Ini</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $totalPenghasilan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-calendar-alt text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Barang</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $totalStok }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-boxes text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Penghasilan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $totalHarga }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-dollar-sign text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pemesanan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $totalPemesanan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Wellcome</p>
                                    <h5 class="font-weight-bolder">{{ Auth::user()->name }}</h5>
                                    <p class="mb-3 mt-2">Mulai Mengelola Produk</p>
                                    <a href="/barang"><button class="btn btn-primary">Kelola Produk</button></a>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-50 position-relative z-index-2 pt-3 pb-3"
                                            src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4 mt-3">
                <div class="card">
                    <div class="card-body p-3 ">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Pemesanan Terbanyak</p>
                                    @if (isset($produkTeratasInfo))
                                        <h5 class="font-weight-bolder">{{ $produkTeratasInfo->nama_produk }}</h5>
                                        <p class="mb-3 mt-2">Total Pemesanan : {{ $totalPenjualanTeratas }}</p>
                                        <a class="text-secondar text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                            href="/detail-penjualan/{{ $produkTeratasInfo->produk_id }}">
                                            Cek Pemesanan
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <h5 class="font-weight-bolder">Tidak Ada Penjualan</h5>
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                @if (isset($produkTeratasInfo))
                                    <img src="{{ asset('/storage/image/' . $produkTeratasInfo->image) }}" class="card-img"
                                        style="object-fit: cover;max-width: 165px; max-height: 145px;" alt="...">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 mt-3">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h4 class="text-center">Total Casbon</h4>
                    </div>
                    <div class="card-body p-3">
                        <h5 class="text-secondary">Jumlah Kasbon</h5>
                        <h6 class="text-secondary"><u>{{ $jumlahKasbon }}</u></h6>
                        <hr class="bg-dark">
                        <h5 class="text-secondary">Total Kasbon</h5>
                        <h6 class="text-secondary"><u>{{ $totalKasbonBelumLunasi }}</u></h6>
                        <hr class="bg-dark">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 mt-3">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h4 class="text-center">Informasi Pembayaran</h4>
                    </div>
                    <div class="card-body p-3">
                        <h5 class="text-secondary">Jumlah Kasbon</h5>
                        <h6 class="text-secondary"><u>{{ $jumlahKasbon }}</u></h6>
                        <hr class="bg-dark">
                        <h5 class="text-secondary">Jumlah yang Belum Lunas</h5>
                        <h6 class="text-secondary"><u>{{ $jumlahBelumLunas }}</u></h6>
                        <hr class="bg-dark">
                        <h5 class="text-secondary">Jumlah yang Sudah Lunas</h5>
                        <h6 class="text-secondary"><u>{{ $jumlahLunas }}</u></h6>
                        <hr class="bg-dark">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
