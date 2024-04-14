@extends('main')

@section('content')
    <div class="container-fluid py-4">
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
                                @if ($errors->any())
                                    <div class="alert alert-danger opacity-7 text-white">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body px-0 pt-0 pb-2 ps-4 me-4">
                                <form method="POST" action="/pembelian/verifikasi">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="list-group">
                                            <div class="mb-3">
                                                <h4 class="font-weight-bold text-md">Detail Pembeli</h4>
                                                <div class="mb-3">
                                                    <label for="nama_pelanggan"
                                                        class="form-label text-sm required-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama_pelanggan"
                                                        id="nama_pelanggan" required>
                                                </div>
                                                <label for="pembayaran"
                                                    class="form-label text-sm required-label">Bayar</label>
                                                <div class="mb-3 input-group">
                                                    <input style="max-height: 40px" type="number" class="form-control rounded-end" placeholder="Bayar"
                                                        aria-label="Bayar" aria-describedby="button-addon2" name="pembayaran" id="pembayaran"
                                                        required>
                                                    <button class="btn btn-primary" type="button" id="button-addon2"
                                                        onclick="setTotalHarga()">Uang Pas</button>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label text-sm">Alamat</label>
                                                    <input type="alamat" class="form-control" name="alamat"
                                                        id="alamat">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telpon" class="form-label text-sm">No Telpon</label>
                                                    <input type="number" class="form-control" name="telpon" id="telpon"
                                                        onblur="validatePhoneNumber()">
                                                </div>
                                            </div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Nama Produk</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga Per Piece</th>
                                                        <th>Total Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalHargaKeseluruhan = 0; // Inisialisasi total harga keseluruhan
                                                    @endphp
                                                    @foreach ($produk_data as $produkId => $produk)
                                                        <tr>
                                                            <td>{{ $produk['produk']->nama_produk }}</td>
                                                            <td>{{ $produk['jumlah'] }}</td>
                                                            <td>Rp. {{ $produk['produk']->harga }}</td>
                                                            <td>
                                                                <!-- Total Harga ditampilkan setelah input jumlah diisi -->
                                                                <span id="totalHarga_{{ $produkId }}">Rp.
                                                                    {{ $produk['jumlah'] * $produk['produk']->harga }}</span>
                                                            </td>
                                                            <!-- Input untuk menyimpan produk_id -->
                                                            <input type="hidden" name="produk" id="produk"
                                                                value="{{ $produkId }}">
                                                        </tr>
                                                        @php
                                                            $totalHargaKeseluruhan +=
                                                                $produk['jumlah'] * $produk['produk']->harga;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Tampilkan total harga keseluruhan -->
                                            <div class="pt-3">
                                                <strong>Total Harga Keseluruhan : </strong><u>Rp.
                                                    {{ $totalHargaKeseluruhan }}</u>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-custom float-end">Submit</button>
                                    <a href="/pembelian" class="btn bg-gradient-danger ">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pembayaranInput = document.getElementById('pembayaran');
            const totalHargaKeseluruhan = <?php echo json_encode($totalHargaKeseluruhan); ?>;

            pembayaranInput.addEventListener('input', function() {
                const pembayaranValue = parseFloat(pembayaranInput.value);

                if (pembayaranValue < totalHargaKeseluruhan) {
                    pembayaranInput.setCustomValidity('Jumlah Pembayaran Kurang Dari Total Harga');
                } else {
                    pembayaranInput.setCustomValidity('');
                }
            });
        });

        function setTotalHarga() {
            const pembayaranInput = document.getElementById('pembayaran');
            const totalHargaKeseluruhan = <?php echo json_encode($totalHargaKeseluruhan); ?>;

            pembayaranInput.value = totalHargaKeseluruhan;
        }
    </script>

@endsection
