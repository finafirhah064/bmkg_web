<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Volt CSS -->
    <link href="../../assets/css/volt.css" rel="stylesheet">
    <style>
        .progress-thin {
            height: 6px;
        }

        .badge-visibility {
            min-width: 80px;
        }

        .btn-custom {
            background-color: #4CAF50;
            /* Hijau */
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #45a049;
            /* Warna hover */
        }

        /* Styling untuk tabel */
        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }

        .table th,
        .table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .table td {
            text-align: center;
        }

        /* Modal Styling */
        .modal-content {
            padding: 20px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-footer {
            background-color: #f4f4f4;
        }

        .modal-body {
            padding: 20px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-close {
            font-size: 1.5rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Alert styling */
        .alert {
            padding: 10px 15px;
            margin-top: 10px;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
        }

        /* Ensure the content stretches across the available space */
        .container {
            width: 100%;
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Adjust table responsiveness */
        .table-responsive {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        /* Full width for the table */
        .table {
            width: 100%;
        }

        /* Optional: Adjust the table's header styling */
        .table th {
            text-align: left;
            background-color: #f4f4f4;
        }

        /* Adjust margins or padding of the page if necessary */
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <main class="content">
        <!-- Flash messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Breadcrumb and header section -->
        <div class="container mt-4">
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
                        <li class="breadcrumb-item"><a href="#">Hilal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gambar Hilal</li>
                    </ol>
                </nav>

                <div class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="h4">Data Gambar Hilal</h1>
                        <p class="mb-0">Manajemen data gambar hilal yang telah diupload.</p>
                    </div>
                    <div>
                        <a href="#" class="btn btn-custom d-inline-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#addModal">
                            <i class="fas fa-plus me-2"></i>
                            Tambah Data
                        </a>

                    </div>
                </div>
            </div>

            <!-- Table for displaying data -->
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID Gambar</th>
                            <th>Path Gambar</th>
                            <th>Keterangan</th>
                            <th>Gambar Utama</th>
                            <th>Tahun Hijriyah</th>
                            <th>Bulan Hijriyah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($gambar_hilal) && count($gambar_hilal) > 0): ?>
                            <?php foreach ($gambar_hilal as $gambar): ?>
                                <tr>
                                    <td><?= $gambar['id_gambar_hilal']; ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/gambar_hilal/' . $gambar['path_gambar']); ?>"
                                            alt="Gambar Hilal" style="width: 100px; height: auto;">

                                    </td>
                                    <td><?= $gambar['keterangan']; ?></td>
                                    <td><?= $gambar['adalah_gambar_utama'] ? 'Ya' : 'Tidak'; ?></td>
                                    <td><?= $gambar['tahun_hijri']; ?></td>
                                    <td><?= $gambar['bulan_hijri']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal<?= $gambar['id_gambar_hilal']; ?>">Edit</a>
                                        <a href="<?= base_url('hilal/delete_gambar/' . $gambar['id_gambar_hilal']); ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data gambar hilal.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal for adding Gambar Hilal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Gambar Hilal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('hilal/upload_gambar'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Pilih Gambar Hilal</label>
                                <input type="file" class="form-control" name="gambar" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_utama" class="form-label">Jadikan Gambar Utama</label>
                                <input type="checkbox" name="gambar_utama" value="1">
                            </div>
                            <div class="mb-3">
                                <label for="tahun_hijri" class="form-label">Tahun Hijriyah</label>
                                <input type="number" class="form-control" name="tahun_hijri" required>
                            </div>
                            <div class="mb-3">
                                <label for="bulan_hijri" class="form-label">Bulan Hijriyah</label>
                                <input type="number" class="form-control" name="bulan_hijri" required min="1" max="12">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for editing Gambar Hilal -->
        <?php foreach ($gambar_hilal as $gambar): ?>
            <div class="modal fade" id="editModal<?= $gambar['id_gambar_hilal']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Gambar Hilal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('hilal/update_gambar/' . $gambar['id_gambar_hilal']); ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Pilih Gambar Baru</label>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"
                                        value="<?= $gambar['keterangan']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_utama" class="form-label">Jadikan Gambar Utama</label>
                                    <input type="checkbox" name="gambar_utama" value="1" <?= $gambar['adalah_gambar_utama'] ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>






        <!-- JS and Bootstrap Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>