<main class="content">
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
                <li class="breadcrumb-item active" aria-current="page">Form Tambah</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Data</h1>
                <p class="mb-0">Halaman Data Terbit Tenggelam</p>
            </div>
            <div>
                <form action="<?= site_url('admin/terbit-tenggelam/upload') ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="file" name="excel_file" id="fileInput" style="display: none;" accept=".xls,.xlsx,.csv"
                        onchange="this.form.submit();">
                    <a href="#" class="btn btn-outline-success d-inline-flex align-items-center me-2"
                        onclick="document.getElementById('fileInput').click(); return false;">
                        <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Upload File
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
                    <form method="POST" action="<?= site_url('admin/terbit-tenggelam/save') ?>">
                        <div class="row mb-4">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="tanggal">Tanggal</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                </div>
                                <!-- Waktu Terbit -->
                                <div class="mb-4">
                                    <label for="waktuTerbit">Waktu Terbit</label>
                                    <div class="input-group">
                                        <input type="time" class="form-control" id="waktuTerbit" name="waktu_terbit"
                                            placeholder="HH:mm" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <!-- Waktu Tenggelam -->
                                <div class="mb-4">
                                    <label for="waktuTenggelam">Waktu Tenggelam</label>
                                    <div class="input-group">
                                        <input type="time" class="form-control" id="waktuTenggelam"
                                            name="waktu_tenggelam" placeholder="HH:mm" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="kecamata">Kota/Kecamatan</label>
                                    <select name="kecamatan" class="form-control" required>
                                        <option value="">-- Pilih Kota/Kecamatan --</option>
                                        <option value="Malang">Malang</option>
                                        <option value="Batu">Batu</option>
                                        <option value="Kepanjen">Kepanjen</option>
                                        <option value="Blitar">Blitar</option>
                                        <option value="Tulungagung">Tulungagung</option>
                                        <option value="Jember">Jember</option>
                                        <option value="Lumajang">Lumajang</option>
                                        <option value="Jember">Banyuwangi</option>
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