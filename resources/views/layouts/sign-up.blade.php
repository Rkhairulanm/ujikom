<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <main class="main-content mt-0">
        <section class="min-vh-100 mb-0">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mt-5">Welcome!</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0 shadow-lg">
                            <div class="card-header text-center pt-4 mb-0">
                                <h3>Register</h3>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name"
                                            aria-describedby="email-addon" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            aria-label="Email" aria-describedby="email-addon" required>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="role" required>
                                            <option class="text-secondary opacity-5" value="" disabled selected>
                                                Select Role</option>
                                            @foreach ($role as $k)
                                                <option value="{{ $k->role_id }}">{{ $k->role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <input type="password" name="password" class="form-control" placeholder="Password"
                                            aria-label="Password" aria-describedby="password-addon" required>
                                    </div>
                                    @if (Session::has('status'))
                                        <div class="ps-1 pt-3 text-success" role="alert">
                                            <div class="d-flex justify-content-between">
                                                <div>{{ Session::get('message') }}</div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mt-5 text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 mb-3 mb-2">Sign
                                            up</button>
                                        <a href="/" class="btn btn-sm btn-outline-dark w-100 mb-3 mb-2">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
