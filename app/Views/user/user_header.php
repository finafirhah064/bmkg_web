<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>BMKG Karangkates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Admin Dashboard">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt - Free Bootstrap 5 Admin Dashboard">
    <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt - Free Bootstrap 5 Admin Dashboard">
    <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/bmkg-logo.png">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png"> -->
    <link rel="manifest" href="./assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Sweet Alert -->
    <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="../../css/volt.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



    <meta charset="UTF-8">
    <title>BMKG Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Logo + Branding */
        .navbar-brand {
            display: flex;
            align-items: center;
            padding-top: 6px;
            /* JARAK DARI ATAS */
            padding-bottom: 6px;
        }

        .navbar-brand img {
            height: 56px;
            margin-right: 10px;
        }

        .text-brand {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1.3;
            color: #000;
        }

        .text-brand strong {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 2px;
        }

        .text-brand span {
            font-size: 13px;
            color: #333;
        }

        /* Navigation links */
        .navbar-nav>.nav-item>.nav-link {
            font-size: 16px;
            font-weight: 500;
            padding: 10px 15px;
            color: #000;
            transition: all 0.3s ease;
        }

        .navbar-nav>.nav-item>.nav-link:hover,
        .navbar-nav>.nav-item.dropdown:hover>.nav-link {
            color: rgb(69, 170, 253);
        }

        /* Dropdown styling */
        .dropdown-menu {
            background-color: #f8f9fa;
            border-radius: 0;
        }

        .dropdown-item {
            color: #000;
            padding: 10px 20px;
            font-size: 15px;
        }

        .dropdown-item:hover {
            background-color: #e2e6ea;
        }
    </style>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>



<body>
    <header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-white navbar-light border-bottom">
            <div class="container position-relative">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../../../assets/img/bmkg-logo.png" alt="Logo BMKG" class="me-2">
                    <div class="text-brand">
                        <strong>Stasiun Geofisika</strong>
                        <strong>Kelas III </strong>
                        <span>Malang</span>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar_global">
                    <ul class="navbar-nav ms-auto navbar-nav-hover align-items-lg-center">
                        <li class="nav-item me-3">
                            <a href=<?= base_url('/') ?> class="nav-link">Home</a>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="informasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="informasiDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('user/beritakegiatan') ?>">Berita & Pengumuman</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('user/tentangbmkg') ?>">Tentang BMKG</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan Publik
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('buku-tamu') ?>">Buku Tamu</a></li>

                                <li><a class="dropdown-item" href="<?= base_url('pengajuan_surat') ?>">Pengajuan Surat</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('cek_status_surat') ?>">Cek Status Surat</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Data Observasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('user/petir'); ?>">Petir</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Temperatur</a></li>
                                <li><a class="dropdown-item" href="#">Tekanan Udara</a></li> -->
                                <li><a class="dropdown-item" href="<?= base_url('/user/terbit-tenggelam'); ?>">Terbit & Tenggelam</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('user/hilal'); ?>">Hilal</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Hiposenter</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <!-- Bootstrap JS -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->