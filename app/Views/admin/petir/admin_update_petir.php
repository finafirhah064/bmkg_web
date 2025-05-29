<main class="content">
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                <div class="d-flex align-items-center">
                    <!-- Search form -->
                    <!-- <form class="navbar-search form-inline" id="navbar-search-main" method="GET" action="<?= base_url('Petir') ?>">
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" name="keyword" id="topbarInputIconLeft" placeholder="Cari wilayah..."
                                value="<?= esc($keyword ?? '') ?>" aria-label="Search" aria-describedby="topbar-addon">
                        </div>
                    </form> -->
                </div>
    </nav>
    <!-- Breadcrumb -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('dashboard'); ?>">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="<?= site_url('Petir'); ?>">Data Petir</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Data</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Update Data Petir</h1>
                <p class="mb-0">Form untuk memperbarui data petir berdasarkan ID.</p>
            </div>
        </div>
    </div>

    <!-- Form Update Data Petir -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">

                    <!-- Flash Message -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= esc(session()->getFlashdata('success')) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= esc(session()->getFlashdata('error')) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Form Start -->
                    <form method="POST" action="<?= site_url('Petir/update/' . ($petir['id'] ?? '')) ?>">
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="<?= isset($petir['tanggal']) ? date('Y-m-d', strtotime($petir['tanggal'])) : '' ?>"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu_sambaran" class="form-label">Waktu Sambaran</label>
                                    <input type="time" class="form-control" id="waktu_sambaran" name="waktu_sambaran"
                                        value="<?= esc($petir['waktu_sambaran'] ?? '') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="wilayah" class="form-label">Wilayah</label>
                                    <input type="text" class="form-control" id="wilayah" name="wilayah"
                                        value="<?= esc($petir['wilayah'] ?? '') ?>" required>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="number" step="0.000001" class="form-control" id="latitude"
                                        name="latitude" value="<?= esc($petir['latitude'] ?? '') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="number" step="0.000001" class="form-control" id="longitude"
                                        name="longitude" value="<?= esc($petir['longitude'] ?? '') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_petir" class="form-label">Jenis Petir</label>
                                    <select class="form-control" id="jenis_petir" name="jenis_petir" required>
                                        <option value="">-- Pilih Jenis Petir --</option>
                                        <option value="cg-0" <?= ($petir['jenis_petir'] ?? '') === 'cg-0' ? 'selected' : '' ?>>CG-0</option>
                                        <option value="cg+1" <?= ($petir['jenis_petir'] ?? '') === 'cg+1' ? 'selected' : '' ?>>CG+1</option>
                                        <option value="ic2" <?= ($petir['jenis_petir'] ?? '') === 'ic2' ? 'selected' : '' ?>>IC2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Perbarui Data</button>
                        </div>
                    </form>
                    <!-- Form End -->

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