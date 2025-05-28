<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>BMKG</title>
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
<link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
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


<!-- Custom Navbar Styling -->
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .navbar-nav > .nav-item > .nav-link {
        font-size: 16px;
        font-weight: 500;
        padding: 10px 15px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .navbar-nav > .nav-item > .nav-link:hover,
    .navbar-nav > .nav-item.dropdown:hover > .nav-link {
        color:rgb(69, 170, 253);
    }

    .navbar-nav .dropdown-menu {
        background-color: #0d1b2a;
        border: none;
        border-radius: 0;
        margin-top: 0;
    }

    .dropdown-menu .dropdown-item {
        color: #ffffff;
        padding: 10px 20px;
        font-size: 15px;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #1b263b;
        color:rgb(69, 170, 253);
    }

    .nav-link.dropdown-toggle::after {
        display: inline-block;
        margin-left: 0.35em;
        vertical-align: middle;
        /* content: " ▼"; */
        font-size: 12px;
    }
</style>
</head>

<body>
    <header class="header-global">
<nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary pt-4 navbar-dark">
    <div class="container position-relative">
        <!-- <a class="navbar-brand" href="./index.html">
            <img src="./assets/img/brand/light.svg" alt="Volt logo">
        </a> -->
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_global"
            aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbar_global">
            <ul class="navbar-nav ms-auto navbar-nav-hover align-items-lg-center">
                <li class="nav-item me-3">
                    <a href="<?= base_url('/#top'); ?>" class="nav-link">Home</a>
                </li>

                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" id="informasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="informasiDropdown">
                        <li><a class="dropdown-item" href="#">Berita Kegiatan</a></li>
                        <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="#">Tentang BMKG</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan Publik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                        <li><a class="dropdown-item" href="#">Buku Tamu</a></li>
                        <li><a class="dropdown-item" href="#">Pengajuan Surat</a></li>
                        <li><a class="dropdown-item" href="#">Cek Status Surat</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Observasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                        <li><a class="dropdown-item" href="#">Petir</a></li>
                        <li><a class="dropdown-item" href="#">Temperatur</a></li>
                        <li><a class="dropdown-item" href="#">Tekanan Udara</a></li>
                        <li><a class="dropdown-item" href="#">Terbit & Tenggelam</a></li>
                        <li><a class="dropdown-item" href="#">Hilal</a></li>
                        <li><a class="dropdown-item" href="#">Hiposenter</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>