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
                <li class="breadcrumb-item"><a href="#">Gempa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Tambah Data Gempa</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Data Gempa</h1>
                <p class="mb-0">Input data gempa</p>
            </div>
            <div>
                <form action="<?= site_url('Gempa/upload_excel') ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel_file" id="fileInput" style="display: none;" accept=".xls,.xlsx,.csv"
                        onchange="this.form.submit();">
                    <a href="#" class="btn btn-outline-success d-inline-flex align-items-center me-2"
                        onclick="document.getElementById('fileInput').click(); return false;">
                        <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Upload Excel
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= site_url('Gempa/save') ?>">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" step="0.1" class="form-control" name="tanggal" required>
                                </div>

                                <div class="mb-4">
                                    <label for="jam">Jam</label>
                                    <input type="time" step="0.1" class="form-control" name="jam" required>
                                </div>

                                <div class="mb-4">
                                    <label for="lintang">Lintang</label>
                                    <input type="number" step="0.1" class="form-control" name="lintang" required>
                                </div>
                                <div class="mb-4">
                                    <label for="bujur">Bujur</label>
                                    <input type="number" step="0.1" class="form-control" name="bujur" required>
                                </div>
                            </div>

                            <!-- Kanan -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="depth">Depth</label>
                                    <input type="number" step="0.1" class="form-control" name="depth" required>
                                </div>
                                <div class="mb-4">
                                    <label for="magnitudo">Magnitudo</label>
                                    <input type="number" step="0.1" class="form-control" name="magnitudo" required>
                                </div>
                                <div class="mb-4">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" step="0.1" class="form-control" name="keterangan">
                                </div>
                                <div class="mb-4">
                                    <label for="dirasakan">Dirasakan</label>
                                    <select class="form-control" id="dirasakan" name="dirasakan" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="dirasakan">Dirasakan</option>
                                        <option value="tidak dirasakan">Tidak Dirasakan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

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