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
                <!-- <ul class="navbar-nav align-items-center">
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
                </ul> -->
    </nav>
<!-- Breadcrumb -->
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="<?= base_url('admin/dashboard'); ?>">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="<?= base_url('Gempa'); ?>">Data Gempa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Data</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Update Data Gempa</h1>
            <p class="mb-0">Form untuk memperbarui data Gempa berdasarkan ID.</p>
        </div>
    </div>
</div>

<!-- Form Update Data Gempa -->
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

                <form method="POST" action="<?= site_url('Gempa/update/' . $gempa['id_gempa']) ?>">


                    <div class="row mb-4">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="<?= (strtotime($gempa['Tanggal'])) ? date('Y-m-d', strtotime($gempa['Tanggal'])) : '' ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="jam">Jam</label>
                               <input type="time" class="form-control" id="jam" name="jam"
                                     value="<?= $gempa['Jam'] ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="lintang">Lintang</label>
                                <input type="number" class="form-control" id="lintang" name="lintang"
                                    value="<?= $gempa['Lintang']?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="bujur">Bujur</label>
                                <input type="number" class="form-control" id="bujur" name="bujur"
                                    value="<?= $gempa['Bujur']?>" required>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="depth">Depth</label>
                                <input type="number" step="0.000001" class="form-control" id="depth" name="depth"
                                    value="<?= $gempa['Depth']?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="magnitudo">Magnitudo</label>
                                <input type="number" step="0.000001" class="form-control" id="magnitudo" name="magnitudo"
                                    value="<?= $gempa['Magnitudo']?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" step="0.000001" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $gempa['Keterangan']?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="dirasakan">Dirasakan</label>
                                <select class="form-control" id="dirasakan" name="dirasakan" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Dirasakan" <?= $gempa['Dirasakan'] === 'Dirasakan' ? 'selected' : '' ?>>Dirasakan</option>
                                    <option value="Tidak Dirasakan" <?= $gempa['Dirasakan'] === 'Tidak Dirasakan' ? 'selected' : '' ?>>Tidak Dirasakan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary w-100">Perbarui Data</button>
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