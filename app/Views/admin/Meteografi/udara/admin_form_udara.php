<main class="content">
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Meteografi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Tambah Tekanan Udara</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Data Tekanan Udara</h1>
                <p class="mb-0">Form input data tekanan udara dan kelembaban harian.</p>
            </div>
            <form action="<?= site_url('tekananudara/upload_excel') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="excel_file" id="fileInput" style="display: none;" accept=".xls,.xlsx,.csv"
                    onchange="this.form.submit();">
                <a href="#" class="btn btn-outline-success d-inline-flex align-items-center me-2"
                    onclick="document.getElementById('fileInput').click(); return false;">
                    <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Upload Excel
                </a>
            </form>
            <a href="#" class="btn btn-outline-success d-inline-flex align-items-center me-2"
                onclick="document.getElementById('fileInput').click(); return false;">
                <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
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
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form method="POST" action="<?= site_url('tekananudara/save') ?>">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" class="form-control" name="tgl" required>
                                </div>
                                <div class="mb-4">
                                    <label for="tekanan_udara">Tekanan Udara (mb)</label>
                                    <input type="number" step="0.1" class="form-control" name="tekanan_udara" required>
                                </div>
                                <div class="mb-4">
                                    <label for="kelembaban_07">Kelembaban 07:00 (%)</label>
                                    <input type="number" step="0.1" class="form-control" name="kelembaban_07">
                                </div>
                                <div class="mb-4">
                                    <label for="kelembaban_13">Kelembaban 13:00 (%)</label>
                                    <input type="number" step="0.1" class="form-control" name="kelembaban_13">
                                </div>
                                <div class="mb-4">
                                    <label for="kelembaban_18">Kelembaban 18:00 (%)</label>
                                    <input type="number" step="0.1" class="form-control" name="kelembaban_18">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="kecepatan_rata2">Kecepatan Rata-rata (km/jam)</label>
                                    <input type="number" step="0.1" class="form-control" name="kecepatan_rata2">
                                </div>
                                <div class="mb-4">
                                    <label for="arah_terbanyak">Arah Angin Terbanyak</label>
                                    <input type="text" class="form-control" name="arah_terbanyak">
                                </div>
                                <div class="mb-4">
                                    <label for="kecepatan_terbesar">Kecepatan Terbesar (knots)</label>
                                    <input type="number" step="0.1" class="form-control" name="kecepatan_terbesar">
                                </div>
                                <div class="mb-4">
                                    <label for="arah_kecepatan_terbesar">Arah Kecepatan Terbesar</label>
                                    <input type="text" class="form-control" name="arah_kecepatan_terbesar">
                                </div>
                            </div>
                        </div>

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