<?php
// Pastikan variabel $administrasi sudah didefinisikan dari controller
?>
<main class="content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                <div class="d-flex align-items-center">
                    <form class="navbar-search form-inline" id="navbar-search-main">
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="media d-flex align-items-center">
                                <img class="avatar rounded-circle" alt="Image placeholder" src="../../assets/img/team/bmkg.jpg">
                                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                    <span class="mb-0 font-small fw-bold text-gray-900">Admin</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    <!-- Breadcrumb -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#">Administrasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form method="POST" action="<?= site_url('administrasi/update/' . $administrasi->id_mahasiswa) ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"><label>NIM</label><input type="text" class="form-control" name="nim" value="<?= $administrasi->nim ?>"></div>
                                <div class="mb-3"><label>Nama</label><input type="text" class="form-control" name="nama" value="<?= $administrasi->nama ?>"></div>
                                <div class="mb-3"><label>Universitas</label><input type="text" class="form-control" name="universitas" value="<?= $administrasi->universitas ?>"></div>
                                <div class="mb-3">
                                    <label>Jenis Kegiatan</label>
                                    <select name="jenis_kegiatan" class="form-control">
                                        <option value="PKL" <?= $administrasi->jenis_kegiatan == 'PKL' ? 'selected' : '' ?>>PKL</option>
                                        <option value="Skripsi" <?= $administrasi->jenis_kegiatan == 'Skripsi' ? 'selected' : '' ?>>Skripsi</option>
                                        <option value="Kunjungan" <?= $administrasi->jenis_kegiatan == 'Kunjungan' ? 'selected' : '' ?>>Kunjungan</option>
                                    </select>
                                </div>
                                <div class="mb-3"><label>Judul</label><input type="text" class="form-control" name="judul" value="<?= $administrasi->judul ?>"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"><label>Pembimbing</label><input type="text" class="form-control" name="pembimbing" value="<?= $administrasi->pembimbing ?>"></div>
                                <div class="mb-3"><label>Stasiun/Divisi</label><input type="text" class="form-control" name="stasiun_divisi" value="<?= $administrasi->stasiun_divisi ?>"></div>
                                <div class="mb-3"><label>Tanggal Mulai</label><input type="date" class="form-control" name="tanggal_mulai" value="<?= $administrasi->tanggal_mulai ?>"></div>
                                <div class="mb-3"><label>Tanggal Selesai</label><input type="date" class="form-control" name="tanggal_selesai" value="<?= $administrasi->tanggal_selesai ?>"></div>
                                <div class="mb-3"><label>File Laporan</label><input type="file" class="form-control" name="file_laporan"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Data</button>
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