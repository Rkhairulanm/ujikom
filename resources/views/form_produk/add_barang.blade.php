@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="">Tambah Produk</h4>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body px-0 pt-0 pb-2 ps-4 me-4">
                            <form id="myForm" action="/proses" method="POST"    >
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label text-sm required-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label text-sm">Kategori</label>
                                    <select class="form-select" name="kategori_id" id="kategori_id">
                                        <option value="" selected>Pilih kategori...</option>
                                        @foreach ($kategori as $category)
                                            <option value="{{ $category->kategori_id }}">{{ $category->kategori }}</option>
                                        @endforeach
                                        <option value="new">Tambah Kategori Baru</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="newCategoryInput" style="display: none;">
                                    <label for="new_category" class="form-label text-sm">Masukkan Kategori Baru</label>
                                    <input type="text" class="form-control" name="new_category" id="new_category">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label text-sm required-label">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga" required>
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label text-sm required-label">Stok</label>
                                    <input type="number" class="form-control" name="stok" id="stok" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label text-sm required-label">Foto</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        accept="image/*" onchange="previewImage(event)" required>
                                </div>
                                <div id="imagePreview" class="mb-3" style="display: none;">
                                    <img src="#" class="rounded" alt="Preview"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                                <a href="/barang" class="btn bg-gradient-danger ">Back</a>
                                <button type="submit" class="btn btn-custom float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function previewImage(event) {
            const preview = document.querySelector('#imagePreview img');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
                document.getElementById('imagePreview').style.display = 'block'; // Tampilkan image preview
            } else {
                preview.src = "#";
                document.getElementById('imagePreview').style.display = 'none'; // Sembunyikan image preview
            }
        }
    </script>
    <script>
        document.getElementById('kategori_id').addEventListener('change', function() {
            var newCategoryInput = document.getElementById('newCategoryInput');
            var selectedOption = this.value;
            if (selectedOption === 'new') {
                newCategoryInput.style.display = 'block';
            } else {
                newCategoryInput.style.display = 'none';
            }
        });
    </script>
@endsection
