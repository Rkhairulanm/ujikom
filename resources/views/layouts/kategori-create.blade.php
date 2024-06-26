@extends('main')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="">Tambah Kategori</h4>
                            <hr class="bg-dark px-auto">
                            @if (Session::has('status'))
                                <div class="alert alert-success text-white opacity-5" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body px-0 pt-0 pb-2 ps-4 me-4">
                            <form id="myForm" method="POST"    >
                                @csrf
                                <div class="mb-5" id="newCategoryInput">
                                    <label for="kategori" class="form-label text-sm">Masukkan Kategori Baru</label>
                                    <input type="text" class="form-control" name="kategori">
                                </div>
                                <a href="/kategori" class="btn bg-gradient-danger ">Back</a>
                                <button type="submit" class="btn btn-custom float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
