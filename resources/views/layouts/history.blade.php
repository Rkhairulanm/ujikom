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
                                    <h4 class="">Riwayat Penjualan</h4>
                                </div>
                                <form action="" method="get">
                                    <div class="pe-md-3 d-flex align-items-center float-end">
                                        <div class="input-group">
                                            <span style="max-height: 42px" class="input-group-text text-body"><i
                                                    class="fas fa-search" aria-hidden="true"></i></span>
                                            <input style="max-height: 42px;" type="text" class="form-control"
                                                placeholder="Masukan No. Struk" name="keyword">
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
                            {{-- Error Handling --}}
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class=" mx-4 mb-5">
                                    {{-- <div class="ps-4 bg-secondary rounded-3 py-2 pt-3 mb-2">
                                        <h6 class="text-m text-white">Minggu Ini <span class="float-end pe-4">
                                                @php
                                                    $totalJumlah = 0;
                                                    foreach ($struk as $str) {
                                                        $totalJumlah += $str->pembelian->sum('jumlah');
                                                    }
                                                    echo $totalJumlah;
                                                @endphp
                                            </span></h6>
                                    </div> --}}
                                    @foreach ($struk as $k)
                                        @php
                                            $pelanggan = $k->pembelian->first()->pelanggan ?? null;
                                            $totalHarga = $k->pembelian->first()->total ?? null;
                                        @endphp
                                        <a href="/detail-struk/{{ $k->struk_id }}">
                                            <div class="row me-4">
                                                <div class="col">
                                                    <div class="d-flex mt-3">
                                                        <i class="ps-4 mt-4 fa-solid fa-receipt fa-2xl"></i>
                                                        <h6 class="text-m ps-3 text-bold">{{ $k->struk }} <br><span
                                                                class="text-secondary">
                                                                {{ $pelanggan ? $pelanggan->nama_pelanggan : 'Unknown' }}
                                                            </span></h6>
                                                    </div>
                                                </div>
                                                <div class="col" style="padding-top: 17px">
                                                    <h6 class="text-m ps-3 text-bold text-end">
                                                        {{ $totalHarga ?? 'Unknown' }}<br><span
                                                            class="text-secondary">{{ $currentTime }}</span></h6>
                                                </div>
                                            </div>
                                            <hr class="bg-dark">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
