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
                    <!-- / Search form -->
                </div>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="media d-flex align-items-center">
                                <img class="avatar rounded-circle" alt="Image placeholder"
                                    src="../../assets/img/team/bmkg.jpg">
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

    <!-- Mobile Navbar -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="../../index.html">
            <img class="navbar-brand-dark" src="../../assets/img/brand/light.svg" alt="Volt logo" />
            <img class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> 
    <form method="POST" action="<?= site_url('tekananudara/update/' . $tekanan->id_tekanan_udara) ?>">
    <div class="row mb-4">
        <!-- Kolom Kiri -->
        <div class="col-md-6">
            <div class="mb-4">
                <label for="tgl">Tanggal</label>
                <input type="date" class="form-control" name="tgl" value="<?= date('Y-m-d', strtotime($tekanan->tgl)) ?>" required>
            </div>
            <div class="mb-4">
                <label for="tekanan_udara">Tekanan Udara (mb)</label>
                <input type="number" step="0.1" class="form-control" name="tekanan_udara" value="<?= $tekanan->tekanan_udara ?>" required>
            </div>
            <div class="mb-4">
                <label for="kelembaban_07">Kelembaban 07:00 (%)</label>
                <input type="number" step="0.1" class="form-control" name="kelembaban_07" value="<?= $tekanan->kelembaban_07 ?>">
            </div>
            <div class="mb-4">
                <label for="kelembaban_13">Kelembaban 13:00 (%)</label>
                <input type="number" step="0.1" class="form-control" name="kelembaban_13" value="<?= $tekanan->kelembaban_13 ?>">
            </div>
            <div class="mb-4">
                <label for="kelembaban_18">Kelembaban 18:00 (%)</label>
                <input type="number" step="0.1" class="form-control" name="kelembaban_18" value="<?= $tekanan->kelembaban_18 ?>">
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-6">
            <div class="mb-4">
                <label for="kecepatan_rata2">Kecepatan Rata-rata (km/jam)</label>
                <input type="number" step="0.1" class="form-control" name="kecepatan_rata2" value="<?= $tekanan->kecepatan_rata2 ?>">
            </div>
            <div class="mb-4">
                <label for="arah_terbanyak">Arah Angin Terbanyak</label>
                <input type="text" class="form-control" name="arah_terbanyak" value="<?= $tekanan->arah_terbanyak ?>">
            </div>
            <div class="mb-4">
                <label for="kecepatan_terbesar">Kecepatan Terbesar (knots)</label>
                <input type="number" step="0.1" class="form-control" name="kecepatan_terbesar" value="<?= $tekanan->kecepatan_terbesar ?>">
            </div>
            <div class="mb-4">
                <label for="arah_kecepatan_terbesar">Arah Kecepatan Terbesar</label>
                <input type="text" class="form-control" name="arah_kecepatan_terbesar" value="<?= $tekanan->arah_kecepatan_terbesar ?>">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
</form>

  <!-- Scripts -->
  <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="../../vendor/notyf/notyf.min.js"></script>
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../../assets/js/volt.js"></script>

