<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Selamat Datang di Dashboard BMKG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .section-header {
            background: linear-gradient(135deg, #003973, #E5E5BE);
            /* kalem dan modern */
            color: white;
            padding: 80px 0;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .section-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .section-header p {
            font-size: 1rem;
            color: #f8f8f8;
        }

        .icon-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-light-orange {
            background-color: #fff3e0;
        }

        .text-orange {
            color: #ff9800;
        }

        .bg-light-red {
            background-color: #ffebee;
        }

        .bg-light-blue {
            background-color: #e3f2fd;
        }

        .bg-light-yellow {
            background-color: #fffde7;
        }

        .berita-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .btn-outline-primary {
            border-color: #003973;
            color: #003973;
        }

        .btn-outline-primary:hover {
            background-color: #003973;
            color: #fff;
        }

        footer {
            background-color: #003973;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        footer a {
            color: #ffffff;
            text-decoration: underline;
        }

        @media (max-width: 767.98px) {
            .section-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>

    <main>
        <!-- Hero -->
        <section class="section-header text-center">
            <div class="container">
                <h1 class="fw-bold">Selamat Datang!</h1>
                <p class="lead">Pantau data cuaca, suhu, gempa, dan layanan publik secara real-time wilayah Malang.</p>
            </div>
        </section>

        <!-- Statistik Harian -->
        <section class="statistik-harian py-5">
            <div class="container">
                <h3 class="fw-bold text-dark mb-4 text-center">Statistik Harian</h3>
                <div class="row justify-content-center g-4">
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card shadow-sm border-0 rounded-4 text-center p-3">
                            <div class="icon-circle bg-light-orange mb-3 mx-auto">
                                <i class="fas fa-bolt fa-lg text-orange"></i>
                            </div>
                            <h5 class="fw-bold mb-1">1.827</h5>
                            <p class="text-secondary small mb-0">Total Sambaran Petir</p>
                        </div>
                    </div>

                    <<div class="col-6 col-md-3 col-lg-2">
    <div class="card shadow-sm border-0 rounded-4 text-center p-3">
        <div class="icon-circle bg-light-blue mb-3 mx-auto">
            <i class="fas fa-tachometer-alt fa-lg text-info"></i>
        </div>
        <h5 class="fw-bold mb-1"><?= esc($tekanan) ?> hPa</h5>
        <p class="text-secondary small mb-0">Tekanan Udara</p>
    </div>
</div>


                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card shadow-sm border-0 rounded-4 text-center p-3">
                            <div class="icon-circle bg-light-blue mb-3 mx-auto">
                                <i class="fas fa-tachometer-alt fa-lg text-info"></i>
                            </div>
                            <h5 class="fw-bold mb-1">1009 hPa</h5>
                            <p class="text-secondary small mb-0">Tekanan Udara</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card shadow-sm border-0 rounded-4 text-center p-3">
                            <div class="icon-circle bg-light-yellow mb-3 mx-auto">
                                <i class="fas fa-sun fa-lg text-warning"></i>
                            </div>
                            <h5 class="fw-bold mb-1">05.31 - 17.52</h5>
                            <p class="text-secondary small mb-0">Terbit & Tenggelam</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Berita Kegiatan -->
        <!-- Berita Kegiatan -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-dark">Berita Kegiatan</h2>
                    <p class="text-muted" style="color:rgb(0, 43, 86) !important;">Informasi terbaru dari kegiatan dan pengamatan yang dilakukan oleh BMKG.</p>

                </div>
                <div class="row">
                    <!-- Berita Card -->

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                            <img src="./assets/img/berita1.jpg" class="berita-img" alt="Berita 1">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Judul Berita 1</h5>
                                <p class="text-muted small"><i class="fas fa-calendar-alt me-1"></i> 27 Mei 2025</p>
                                <p class="card-text">Ringkasan berita 1 ditampilkan di sini dalam 2–3 baris secara ringkas.</p>
                                <a href="#" class="btn btn-outline-primary rounded-pill btn-sm">Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                            <img src="./assets/img/berita1.jpg" class="berita-img" alt="Berita 2">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Judul Berita 2</h5>
                                <p class="text-muted small"><i class="fas fa-calendar-alt me-1"></i> 27 Mei 2025</p>
                                <p class="card-text">Ringkasan berita 2 ditampilkan di sini dalam 2–3 baris secara ringkas.</p>
                                <a href="#" class="btn btn-outline-primary rounded-pill btn-sm">Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                            <img src="./assets/img/berita1.jpg" class="berita-img" alt="Berita 3">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Judul Berita 3</h5>
                                <p class="text-muted small"><i class="fas fa-calendar-alt me-1"></i> 27 Mei 2025</p>
                                <p class="card-text">Ringkasan berita 3 ditampilkan di sini dalam 2–3 baris secara ringkas.</p>
                                <a href="#" class="btn btn-outline-primary rounded-pill btn-sm">Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>