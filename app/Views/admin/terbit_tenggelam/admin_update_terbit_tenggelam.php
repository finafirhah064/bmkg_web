<main class="content">
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                <div class="d-flex align-items-center">
                    <!-- Search form -->
                    <!-- <form class="navbar-search form-inline" id="navbar-search-main">
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search"
                                aria-label="Search" aria-describedby="topbar-addon">
                        </div>
                    </form> -->
                    <!-- / Search form -->
                </div>
    </nav>
    <!-- Breadcrumb -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Terbit Tenggelam</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Data</h1>
                <p class="mb-0">Halaman Edit Data Terbit Tenggelam</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form method="POST"
                        action="<?= site_url('Home/updateterbittenggelam/' . $terbit_tenggelam->id_terbit_tenggelam) ?>">
                        <div class="row mb-4">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="<?= date('Y-m-d', strtotime($terbit_tenggelam->tanggal)) ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label for="waktuTerbit">Waktu Terbit</label>
                                    <input type="time" class="form-control" id="waktuTerbit" name="waktu_terbit"
                                        value="<?= $terbit_tenggelam->waktu_terbit ?>" required>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="waktuTenggelam">Waktu Tenggelam</label>
                                    <input type="time" class="form-control" id="waktuTenggelam" name="waktu_tenggelam"
                                        value="<?= $terbit_tenggelam->waktu_tenggelam ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label for="kecamatan">Kota/Kecamatan</label>
                                    <select name="kecamatan" class="form-control" required>
                                        <option value="">-- Pilih Kota/Kecamatan --</option>
                                        <option value="Malang" <?= $terbit_tenggelam->kecamatan == 'Malang' ? 'selected' : '' ?>>Malang</option>
                                        <option value="Batu" <?= $terbit_tenggelam->kecamatan == 'Batu' ? 'selected' : '' ?>>Batu</option>
                                        <option value="Kepanjen" <?= $terbit_tenggelam->kecamatan == 'kepanjen' ? 'selected' : '' ?>>Kepanjen</option>
                                        <option value="Blitar" <?= $terbit_tenggelam->kecamatan == 'Blitar' ? 'selected' : '' ?>>Blitar</option>
                                        <option value="Tulungagung" <?= $terbit_tenggelam->kecamatan == 'Tulungagung' ? 'selected' : '' ?>>Tulungagung</option>
                                        <option value="Jember" <?= $terbit_tenggelam->kecamatan == 'Jember' ? 'selected' : '' ?>>Jember</option>
                                        <option value="Lumajang" <?= $terbit_tenggelam->kecamatan == 'Lumajang' ? 'selected' : '' ?>>Lumajang</option>
                                        <option value="Banyuwangi" <?= $terbit_tenggelam->kecamatan == 'Banyuwangi' ? 'selected' : '' ?>>Banyuwangi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit Lebar Penuh -->
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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