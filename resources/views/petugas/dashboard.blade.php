<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Administrasi Kepegawaian SMKN 1 Cimahi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('tamplate/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('tamplate/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('tamplate/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('tamplate/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nama }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->nama }}</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="/petugas/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Biodata-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Biodata</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Biodata-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/petugas/dashboard/biodata">
                            <i class="bi bi-circle"></i><span>Biodata Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="/petugas/storeBiodata">
                            <i class="bi bi-circle"></i><span>Tambah Biodata</span>
                        </a>
                    </li>
                </ul>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Pendidikan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Pendidikan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Pendidikan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/petugas/dashboard/pendidikan">
                            <i class="bi bi-circle"></i><span>Pendidikan Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="/petugas/storePendidikan">
                            <i class="bi bi-circle"></i><span>Tambah Pendidikan</span>
                        </a>
                    </li>
                </ul>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Pangkat-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Pangkat</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Pangkat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/petugas/dashboard/pangkat">
                            <i class="bi bi-circle"></i><span>Pangkat Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="/petugas/storePangkat">
                            <i class="bi bi-circle"></i><span>Tambah Pangkat</span>
                        </a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#pegawai-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-person"></i>
                        <span>Pegawai</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="pegawai-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/petugas/dashboard/pegawai">
                                <i class="bi bi-circle"></i><span>user Pegawai</span>
                            </a>
                        </li>
                        <li>
                            <a href="/petugas/storeUser">
                                <i class="bi bi-circle"></i><span>Tambah user</span>
                            </a>
                        </li>
                    </ul>

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/petugas/dashboard/keluarga">
                    <i class="bi bi-question-circle"></i>
                    <span>Keluarga</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/petugas/dashboard/pelatihan">
                    <i class="bi bi-envelope"></i>
                    <span>Pelatihan</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/petugas/dashboard/cuti">
                    <i class="bi bi-card-list"></i>
                    <span>Cuti</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-file-earmark"></i>
                    <span>Blank</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @yield('storeUserForm')
            @yield('data_pegawai')
            @yield('updateUserForm')

            @yield('storePangkatForm')
            @yield('data_pangkat')
            @yield('updatePangkatForm')

            @yield('storeBiodataForm')
            @yield('data_biodata')
            @yield('updateBiodataForm')

            @yield('storePendidikanForm')
            @yield('data_pendidikan')
            @yield('updatePendidikanForm')

            @yield('data_cuti')

            @yield('data_pelatihan')

            @yield('data_keluarga')

            @yield('section')
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('tamplate/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('tamplate/assets/js/main.js') }}"></script>

</body>

</html>
