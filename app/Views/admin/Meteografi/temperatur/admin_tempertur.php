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
                <li class="breadcrumb-item"><a href="#">Berita Kegiatan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Tambah</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Temperatur</h1>
                <p class="mb-0">Data temperatur bulanan</p>
            </div>
            <div>
                <a href="<?php echo base_url('Temperatur/form_temperatur'); ?>"
                   class="btn btn-outline-success d-inline-flex align-items-center me-2">
                    <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Tambah
                </a>
            </div>
        </div>
    </div>

<!-- Table Card -->
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table id="tabelTemperatur" class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">Tanggal</th>
                        <th class="border-0">07:00</th>
                        <th class="border-0">13:00</th>
                        <th class="border-0">18:00</th>
                        <th class="border-0">Rata²</th>
                        <th class="border-0">Max</th>
                        <th class="border-0">Min</th>
                        <th class="border-0">Curah Hujan</th>
                        <th class="border-0">Penyinaran</th>
                        <th class="border-0">Peristiwa Khusus</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($dataTemperatur as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($row->tgl)); ?></td>
                            <td><?= $row->temperatur_07; ?>°C</td>
                            <td><?= $row->temperatur_13; ?>°C</td>
                            <td><?= $row->temperatur_18; ?>°C</td>
                            <td><?= $row->rata2; ?>°C</td>
                            <td><?= $row->max; ?>°C</td>
                            <td><?= $row->min; ?>°C</td>
                            <td><?= $row->curah_hujan_07; ?> mm</td>
                            <td><?= $row->penyinaran_matahari; ?>%</td>
                            <td><?= $row->peristiwa_khusus ?? '-'; ?></td>
                            <td>
                                <a href="<?= base_url('/Temperatur/form_update_temperatur/' . $row->id_temperatur); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= base_url('/Temperatur/delete_temperatur/' . $row->id_temperatur); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById("topbarInputIconLeft");
        const table = document.getElementById("tabelTemperatur");
        const rows = table.getElementsByTagName("tr");

        input.addEventListener("keyup", function () {
            const filter = input.value.toLowerCase();

            for (let i = 1; i < rows.length; i++) {
                const rowText = rows[i].textContent.toLowerCase();
                rows[i].style.display = rowText.includes(filter) ? "" : "none";
            }
        });
    });
</script>

    <!-- Trix Editor -->
    <link rel="stylesheet" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>