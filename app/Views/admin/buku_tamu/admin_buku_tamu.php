<main class="content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                <div class="d-flex align-items-center">
                    <form class="navbar-search form-inline" method="GET" action="<?= base_url('buku_tamu') ?>">
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input type="text" name="keyword" class="form-control"
                                placeholder="Cari nama atau instansi..."
                                value="<?= esc($keyword ?? '') ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg></a></li>
                <li class="breadcrumb-item"><a href="#">Buku Tamu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Buku Tamu</h1>
                <p class="mb-0">Riwayat kunjungan tamu ke BMKG.</p>
            </div>
            <div>
                <a href="<?= base_url('buku_tamu/export') ?>" class="btn btn-outline-success d-inline-flex align-items-center me-2">
                    <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-8m0 8l-4-4m4 4l4-4m-9 6h10" />
                    </svg>
                    Export Excel
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-hover mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Instansi</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Kesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($bukutamu as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($row->nama) ?></td>
                                <td><?= esc($row->email ?? '-') ?></td>
                                <td><?= esc($row->instansi ?? '-') ?></td>
                                <td><?= esc($row->kegiatan ?? '-') ?></td>
                                <td><?= esc($row->tanggal_kunjungan ?? '-') ?></td>
                                <td><?= esc($row->waktu_kunjungan ?? '-') ?></td>
                                <td><?= esc($row->kesan ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('vendor/onscreen/dist/on-screen.umd.min.js') ?>"></script>
    <script src="<?= base_url('vendor/nouislider/distribute/nouislider.min.js') ?>"></script>
    <script src="<?= base_url('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') ?>"></script>
    <script src="<?= base_url('vendor/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?= base_url('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>
    <script src="<?= base_url('vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="<?= base_url('vendor/notyf/notyf.min.js') ?>"></script>
    <script src="<?= base_url('vendor/simplebar/dist/simplebar.min.js') ?>"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= base_url('assets/js/volt.js') ?>"></script>
</main>