@extends('main')

@section('content')
    <div class="container-fluid py-4 d-flex">
        <form id="myForm" action="/proses" method="POST">
            @csrf
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger opacity-7 text-white">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach ($produk as $k)
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card" style="width: 100%; position: relative;">
                            <!-- Checkbox untuk setiap produk -->
                            <input type="checkbox" name="produk[{{ $k->produk_id }}][checked]" id="produk{{ $k->produk_id }}"
                                value="{{ $k->produk_id }}" class="card-checkbox position-absolute"
                                style="top: 14px; right: 12px; transform: scale(2);" {{ $k->stok <= 0 ? 'disabled' : '' }}>
                            <!-- Gambar produk -->
                            <img src="{{ asset('/storage/image/' . $k->image) }}" class="card-img-top w-100"
                                style="object-fit: cover; height: 200px;" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-md">{{ $k->nama_produk }}</h6>
                                        <p class="card-text">Rp.{{ $k->harga }}</p>
                                        @if ($k->stok <= 0)
                                            <span class="badge badge-sm bg-gradient-danger mt-2">Habis</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success mt-2">Tersedia</span>
                                        @endif
                                    </div>
                                    <!-- Input jumlah produk -->
                                    <div class="form-group">
                                        <!-- Set nilai dan atribut max jika stok habis -->
                                        <input type="number" name="produk[{{ $k->produk_id }}][jumlah]"
                                            value="{{ $k->stok <= 0 ? '0' : '1' }}" min="1"
                                            max="{{ $k->stok <= 0 ? '0' : $k->stok }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

    <!-- Tombol submit -->
    <button id="submitButton" type="submit" class="btn btn-primary position-fixed"
        style="bottom: 0; left: 50%; transform: translateX(-50%);">Submit</button>
    </form>

    <!-- JavaScript untuk menangani perubahan pada checkbox -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('myForm');
            var submitButton = document.getElementById('submitButton');

            // Event listener untuk setiap kali terjadi perubahan pada form
            form.addEventListener('change', function() {
                var checkboxes = form.querySelectorAll('input[type="checkbox"]');
                var checkedCheckboxes = form.querySelectorAll('input[type="checkbox"]:checked');
                // Update teks pada tombol submit dengan jumlah checkbox yang dicek
                submitButton.textContent = 'Submit (' + checkedCheckboxes.length + ' selected)';

                checkboxes.forEach(function(checkbox) {
                    // Temukan input jumlah terkait dengan checkbox
                    var inputJumlah = checkbox.closest('.card').querySelector(
                        'input[type="number"]');
                    // Tambah atau hapus atribut disabled sesuai dengan status checkbox
                    if (checkbox.checked) {
                        inputJumlah.removeAttribute('disabled');
                    } else {
                        inputJumlah.setAttribute('disabled', 'disabled');
                    }
                });
            });

            // Set teks awal tombol saat halaman dimuat
            var checkboxes = form.querySelectorAll('input[type="checkbox"]:checked');
            submitButton.textContent = 'Submit (' + checkboxes.length + ' selected)';
        });
    </script>
@endsection
