<main class="content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                <div class="d-flex align-items-center">
                    <!-- Search form -->
                    <form class="navbar-search form-inline" id="navbar-search-main">
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search"
                                aria-label="Search" aria-describedby="topbar-addon">
                        </div>
                    </form>
                </div>

                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="media d-flex align-items-center">
                                <img class="avatar rounded-circle" alt="Image placeholder"
                                    src="<?= base_url('assets/img/team/bmkg.jpg') ?>">
                                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                    <span class="mb-0 font-small fw-bold text-gray-900">Admin</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- CARD BESAR: Container statistik -->
    <div class="card shadow mb-4" style="min-width: 1200px;">
        <div class="card-header">
            <h5 class="mb-0">Statistik Sistem</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Mahasiswa -->
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm text-white" style="background-color: rgb(106, 173, 240);">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill fs-2"></i>
                            <h5 class="card-title mt-2">Mahasiswa</h5>
                            <h2><?= esc($totalMahasiswa) ?></h2>
                            <p class="text-white-50 mb-0">Total PKL, Skripsi, Kunjungan</p>
                        </div>
                    </div>
                </div>

                <!-- Pengajuan Surat -->
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm text-white" style="background-color: rgb(106, 173, 240);">
                        <div class="card-body text-center">
                            <i class="bi bi-envelope-paper-fill fs-2"></i>
                            <h5 class="card-title mt-2">Pengajuan Surat</h5>
                            <h2><?= esc($totalSurat) ?></h2>
                            <p class="text-white-50 mb-0">Total pengajuan</p>
                        </div>
                    </div>
                </div>

                <!-- Data Petir -->
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm text-white" style="background-color: rgb(106, 173, 240);">
                        <div class="card-body text-center">
                            <i class="bi bi-lightning-fill fs-2"></i>
                            <h5 class="card-title mt-2">Data Petir</h5>
                            <h2><?= esc($totalPetir) ?></h2>
                            <p class="text-white-50 mb-0">Jumlah sambaran petir</p>
                        </div>
                    </div>
                </div>

                <!-- Berita Kegiatan -->
                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm text-white" style="background-color: rgb(106, 173, 240);">
                        <div class="card-body text-center">
                            <i class="bi bi-newspaper fs-2"></i>
                            <h5 class="card-title mt-2">Berita Kegiatan</h5>
                            <h2><?= esc($totalBerita) ?></h2>
                            <p class="text-white-50 mb-0">Jumlah berita aktif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Peta Sambaran Petir -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="mb-0">🌩️ Peta Lokasi Sambaran Petir</h5>
        </div>
        <div class="card-body">
            <div id="map" style="height: 500px; width: 100%;"></div>
        </div>
    </div>

    <!-- Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-oYKO9cJ1zF2J1JtC+PQVwuw9ezlWxzK/VcxsU04Lq20=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-o9N1jIYaY+XqEgCJ5W8IomKJk8nm1D3aQ+N4bG+1svM=" crossorigin=""></script>

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-6.2, 106.8], 6); // Pusat peta Indonesia barat

        // Tambahkan peta dasar (tile)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Marker dari data PHP
        <?php foreach ($dataPetir as $item): ?>
            L.marker([<?= $item['latitude'] ?>, <?= $item['longitude'] ?>])
                .addTo(map)
                .bindPopup(`<b><?= esc($item['wilayah']) ?></b><br><?= esc($item['tanggal']) ?> <?= esc($item['waktu_sambaran']) ?><br><i><?= esc($item['jenis_petir']) ?></i>`);
        <?php endforeach; ?>
    </script>


<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-oYKO9cJ1zF2J1JtC+PQVwuw9ezlWxzK/VcxsU04Lq20=" crossorigin="" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-o9N1jIYaY+XqEgCJ5W8IomKJk8nm1D3aQ+N4bG+1svM=" crossorigin=""></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">