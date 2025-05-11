<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tabel Tekanan Udara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Volt CSS -->
    <link href="../../assets/css/volt.css" rel="stylesheet">
</head>

<body>
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
                    </div>
                </div>
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
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tekanan Udara</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data Tekanan Udara</h1>
                    <p class="mb-0">Tampilan data meteorologi: tekanan, kelembaban, dan arah angin.</p>
                </div>
                <div>
                    <a href="#" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                        <i class="fas fa-table me-2"></i>
                        Tabel Dokumentasi
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">ID</th>
                                <th class="border-0">Tanggal</th>
                                <th class="border-0">Tekanan Udara</th>
                                <th class="border-0">Kelembaban 07</th>
                                <th class="border-0">Kelembaban 13</th>
                                <th class="border-0">Kelembaban 18</th>
                                <th class="border-0">Kecepatan Rata-rata</th>
                                <th class="border-0">Arah Terbanyak</th>
                                <th class="border-0">Kecepatan Terbesar</th>
                                <th class="border-0 rounded-end">Arah Kecepatan Terbesar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="fw-bold">1</span></td>
                                <td>2025-05-11</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 fw-bold">1013.2 hPa</span>
                                        <div class="progress w-100" style="height: 6px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info text-dark">85.4%</span></td>
                                <td><span class="badge bg-warning text-dark">70.1%</span></td>
                                <td><span class="badge bg-danger text-light">68.9%</span></td>
                                <td>
                                    <span class="fw-bold text-primary">
                                        <i class="fas fa-wind me-1"></i>4.5 m/s
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-location-arrow me-1"></i>Barat Daya
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-bold text-danger">7.8 m/s</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">
                                        <i class="fas fa-compass me-1"></i>Timur Laut
                                    </span>
                                </td>
                            </tr>
                            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/volt.js"></script>
</body>

</html>
