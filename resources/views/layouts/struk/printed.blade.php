<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Cash-e | {{ $title }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/04deebaf3b.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<style>
    .dashed-line {
        border-top: 1px dashed #9fa6b2;
        width: 100%;
        margin: 20px 0;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-3 text-center">Struk Pembelian</h3>
            <hr>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <center>
                        <h5 class="text-bold">NamaToko</h5>
                        {{-- if has img --}}
                        {{-- <img src="{{ asset('/storage/image/' . $produk->image) }}" alt="" class="rounded-circle"
                            style="max-width: 100; max-height:100px"> --}}
                    </center>
                    <div class="dashed-line"></div>
                    <h6 class="text-secondary">Waktu <span class="float-end">{{ $currentTime }}</span></h6>
                    <h6 class="text-secondary">No.Struk <span class="float-end">{{ $noStruk }}</span></h6>
                    <h6 class="text-secondary">Nama Pelanggan <span class="float-end">{{ $pelanggan->nama_pelanggan }}</span></h6>
                    <div class="dashed-line"></div>
                    <div>
                        <h6 class="text-secondary">Produk</h6>
                        @foreach ($pembelianDetails as $detail)
                            <h6 class="text-secondary mt-0 text-sm">{{ $detail['nama_produk'] }} x
                                {{ $detail['jumlah'] }} <span class="float-end">Rp.{{ $detail['total'] }}</span></h6>
                        @endforeach
                    </div>
                    <div class="dashed-line"></div>
                    <h5 class="text-dark">Total <span class="float-end">Rp.{{ $totalHargaKeseluruhan }}</span></h5>
                    <div class="dashed-line"></div>
                    <h6 class="text-secondary">Bayar <span class="float-end">Rp.{{ $bayar }}</span></h6>
                    <h6 class="text-secondary">Kembalian <span
                            class="float-end">{{ $bayar - $totalHargaKeseluruhan }}</span></h6>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function cetakAndRedirect() {
        window.print();
        setTimeout(function() {
            window.location.href = "/pembelian";
        }, 1000); // Delay 1 detik sebelum mengarahkan kembali
    }

    function unduhPembelian() {
        // Logika unduh pembelian (ganti dengan kode yang sesuai)
        console.log('Pembelian diunduh');
    }
</script>
