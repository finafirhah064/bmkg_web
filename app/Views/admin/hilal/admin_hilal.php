<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pengamatan Hilal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Volt Admin CSS (via CDN) -->
    <link href="https://themesberg.github.io/volt-bootstrap-5-dashboard/assets/css/volt.css" rel="stylesheet">

    <!-- SweetAlert2 CSS (UNPKG) -->
    <link href="https://unpkg.com/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf CSS (UNPKG) -->
    <link href="https://unpkg.com/notyf@3.10.0/notyf.min.css" rel="stylesheet">

    <style>
        .progress-thin {
            height: 6px;
        }

        .badge-visibility {
            min-width: 80px;
        }

        .btn-custom {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <main class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                    </div>
                </div>
            </div>
        </nav>
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
                    <li class="breadcrumb-item"><a href="#">Pengamatan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hilal</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data Pengamatan Hilal</h1>
                    <p class="mb-0">Manajemen data observasi hilal bulanan</p>
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
        <!-- Tab Navigation -->
        <div class="card-body">
            <a href="<?= base_url('hilal/download'); ?>" class="btn btn-success mb-3">
                <i class="fas fa-file-excel me-2"></i> Download Excel
            </a>
            <!-- Form Upload -->
            <form action="<?= base_url('hilal/upload'); ?>" method="post" enctype="multipart/form-data"
                class="d-flex gap-2 align-items-end">
                <div class="w-50">
                    <label for="file" class="form-label">Unggah File Excel</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
                </div>
                <button type="submit" class="btn btn-primary">Unggah</button>
            </form>
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
                                <th class="border-0">Bulan Hijriyah</th>
                                <th class="border-0">Lokasi</th>
                                <th class="border-0">Tinggi Hilal</th>
                                <th class="border-0">Visibilitas</th>
                                <th class="border-0">Status</th>
                                <th class="border-0 rounded-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengamatan as $item): ?>
                                <tr>
                                    <td><span class="fw-bold"><?= $item['id_pengamatan_hilal']; ?></span></td>
                                    <td><?= date('d/m/Y', strtotime($item['tanggal_observasi'])); ?></td>
                                    <td>
                                        <span class="fw-bold"><?= $item['bulan_hijri']; ?></span>
                                        <small class="d-block text-muted"><?= $item['nama_bulan']; ?></small>
                                    </td>
                                    <td>
                                        <?= $item['lokasi']; ?>
                                        <small class="d-block text-muted"><?= $item['latitude']; ?>,
                                            <?= $item['longitude']; ?></small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="me-2 fw-bold"><?= $item['tinggi_bulan']; ?></span>
                                            <div class="progress w-100 progress-thin">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: <?= min(100, (float) $item['tinggi_bulan'] * 10); ?>%;">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $visibilitasClass = [
                                            'teramati' => 'bg-success',
                                            'tidak teramati' => 'bg-danger',
                                            'tidak dilakukan' => 'bg-secondary'
                                        ];
                                        ?>
                                        <span
                                            class="badge badge-visibility <?= $visibilitasClass[$item['status_visibilitas']]; ?>">
                                            <?= ucfirst($item['status_visibilitas']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?= $item['dipublikasikan'] ?
                                            '<span class="badge bg-success">Published</span>' :
                                            '<span class="badge bg-secondary">Draft</span>' ?>
                                    </td>
                                    <td>

                                        <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                            data-bs-target="#editModal<?= $item['id_pengamatan_hilal']; ?>" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal<?= $item['id_pengamatan_hilal']; ?>" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Modal for each row -->
                                <div class="modal fade" id="editModal<?= $item['id_pengamatan_hilal']; ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Pengamatan Hilal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('hilal/update/' . $item['id_pengamatan_hilal']) ?>"
                                                method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6 class="mb-3">Data Kalender</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tahun Hijriyah</label>
                                                                <input type="number" class="form-control" name="tahun_hijri"
                                                                    value="<?= $item['tahun_hijri']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Bulan Hijriyah</label>
                                                                <input type="number" class="form-control" name="bulan_hijri"
                                                                    value="<?= $item['bulan_hijri']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Bulan Hijriyah</label>
                                                                <select class="form-select" name="nama_bulan" required>
                                                                    <?php
                                                                    $bulanHijriyah = [
                                                                        "Muharram",
                                                                        "Safar",
                                                                        "Rabi'ul Awwal",
                                                                        "Rabi'ul Akhir",
                                                                        "Jumadil Ula",
                                                                        "Jumadil Akhir",
                                                                        "Rajab",
                                                                        "Sya'ban",
                                                                        "Ramadhan",
                                                                        "Syawal",
                                                                        "Dzulkaidah",
                                                                        "Dzulhijjah"
                                                                    ];
                                                                    foreach ($bulanHijriyah as $bulan): ?>
                                                                        <option value="<?= $bulan; ?>"
                                                                            <?= $item['nama_bulan'] == $bulan ? 'selected' : ''; ?>>
                                                                            <?= $bulan; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="mb-3">Data Observasi</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tanggal Observasi</label>
                                                                <input type="date" class="form-control"
                                                                    name="tanggal_observasi"
                                                                    value="<?= $item['tanggal_observasi']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Waktu Observasi</label>
                                                                <input type="time" class="form-control"
                                                                    name="waktu_observasi"
                                                                    value="<?= $item['waktu_observasi']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <h6 class="mb-3">Lokasi</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Lokasi</label>
                                                                <input type="text" class="form-control" name="lokasi"
                                                                    value="<?= $item['lokasi']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Latitude</label>
                                                                <input type="text" class="form-control" name="latitude"
                                                                    value="<?= $item['latitude']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Longitude</label>
                                                                <input type="text" class="form-control" name="longitude"
                                                                    value="<?= $item['longitude']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Ketinggian (m)</label>
                                                                <input type="number" step="0.1" class="form-control"
                                                                    name="ketinggian" value="<?= $item['ketinggian']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="mb-3">Hasil Pengamatan</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Status Visibilitas</label>
                                                                <select class="form-select" name="status_visibilitas"
                                                                    required>
                                                                    <option value="teramati"
                                                                        <?= $item['status_visibilitas'] == 'teramati' ? 'selected' : ''; ?>>Teramati</option>
                                                                    <option value="tidak teramati"
                                                                        <?= $item['status_visibilitas'] == 'tidak teramati' ? 'selected' : ''; ?>>Tidak Teramati</option>
                                                                    <option value="tidak dilakukan"
                                                                        <?= $item['status_visibilitas'] == 'tidak dilakukan' ? 'selected' : ''; ?>>Tidak Dilakukan</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Waktu Terbenam Matahari</label>
                                                                <input type="time" class="form-control"
                                                                    name="waktu_terbenam_matahari"
                                                                    value="<?= $item['waktu_terbenam_matahari']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Waktu Terbenam Bulan</label>
                                                                <input type="time" class="form-control"
                                                                    name="waktu_terbenam_bulan"
                                                                    value="<?= $item['waktu_terbenam_bulan']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <h6 class="mb-3">Data Teknis</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Tinggi Bulan</label>
                                                                <input type="text" class="form-control" name="tinggi_bulan"
                                                                    value="<?= $item['tinggi_bulan']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Azimuth Matahari</label>
                                                                <input type="text" class="form-control"
                                                                    name="azimuth_matahari"
                                                                    value="<?= $item['azimuth_matahari']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3" style="margin-top: 2.5rem;">
                                                                <label class="form-label">Azimuth Bulan</label>
                                                                <input type="text" class="form-control" name="azimuth_bulan"
                                                                    value="<?= $item['azimuth_bulan']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Elongasi</label>
                                                                <input type="text" class="form-control" name="elongasi"
                                                                    value="<?= $item['elongasi']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <h6 class="mb-3">Konten Publikasi</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Judul Laporan</label>
                                                                <input type="text" class="form-control" name="judul_laporan"
                                                                    value="<?= $item['judul_laporan']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi"
                                                                    rows="2"><?= $item['deskripsi']; ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Kondisi Cuaca</label>
                                                                <textarea class="form-control" name="kondisi_cuaca"
                                                                    rows="2"><?= $item['kondisi_cuaca']; ?></textarea>
                                                            </div>
                                                            <div class="mb-3 form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="dipublikasikan"
                                                                    id="publish<?= $item['id_pengamatan_hilal']; ?>"
                                                                    value="1" <?= $item['dipublikasikan'] ? 'checked' : ''; ?>>
                                                                <label class="form-check-label"
                                                                    for="publish<?= $item['id_pengamatan_hilal']; ?>">Publikasikan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal for each row -->
                                <div class="modal fade" id="deleteModal<?= $item['id_pengamatan_hilal']; ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus data pengamatan hilal ini?</p>
                                                <p class="fw-bold"><?= $item['nama_bulan']; ?>     <?= $item['tahun_hijri']; ?>
                                                    - <?= $item['lokasi']; ?></p>
                                                <p class="text-danger">Semua gambar terkait juga akan dihapus!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="hilal/delete/<?= $item['id_pengamatan_hilal']; ?>"
                                                    class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card border-0 shadow mt-4">





                <!-- Upload Modal -->
                <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Unggah Data Pengamatan Hilal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('hilal/upload'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih File Excel</label>
                                        <input type="file" class="form-control" name="file" accept=".xlsx" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Pengamatan Hilal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('hilal/simpan') ?>" method="post">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="mb-3">Data Kalender</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Tahun Hijriyah</label>
                                                <input type="number" class="form-control" name="tahun_hijri" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Bulan Hijriyah</label>
                                                <input type="number" class="form-control" name="bulan_hijri" min="1"
                                                    max="12" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Bulan Hijriyah</label>
                                                <select class="form-select" name="nama_bulan" required>
                                                    <?php
                                                    $bulanHijriyah = [
                                                        "Muharram",
                                                        "Safar",
                                                        "Rabi'ul Awwal",
                                                        "Rabi'ul Akhir",
                                                        "Jumadil Ula",
                                                        "Jumadil Akhir",
                                                        "Rajab",
                                                        "Sya'ban",
                                                        "Ramadhan",
                                                        "Syawal",
                                                        "Dzulkaidah",
                                                        "Dzulhijjah"
                                                    ];
                                                    foreach ($bulanHijriyah as $bulan): ?>
                                                        <option value="<?= $bulan; ?>" <?= $item['nama_bulan'] == $bulan ? 'selected' : ''; ?>>
                                                            <?= $bulan; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="mb-3">Data Observasi</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Observasi</label>
                                                <input type="date" class="form-control" name="tanggal_observasi"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Waktu Observasi</label>
                                                <input type="time" class="form-control" name="waktu_observasi">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6 class="mb-3">Lokasi</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Lokasi</label>
                                                <input type="text" class="form-control" name="lokasi" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Latitude</label>
                                                <input type="text" class="form-control" name="latitude"
                                                    placeholder="Contoh: 8°09'48.6&quot; LS">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Longitude</label>
                                                <input type="text" class="form-control" name="longitude"
                                                    placeholder="Contoh: 112°26'46.2&quot; BT">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ketinggian (m)</label>
                                                <input type="number" step="0.1" class="form-control" name="ketinggian">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="mb-3">Hasil Pengamatan</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Status Visibilitas</label>
                                                <select class="form-select" name="status_visibilitas" required>
                                                    <option value="teramati">Teramati</option>
                                                    <option value="tidak teramati">Tidak Teramati</option>
                                                    <option value="tidak dilakukan">Tidak Dilakukan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Waktu Terbenam Matahari</label>
                                                <input type="time" class="form-control" name="waktu_terbenam_matahari">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Waktu Terbenam Bulan</label>
                                                <input type="time" class="form-control" name="waktu_terbenam_bulan">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6 class="mb-3">Data Teknis</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Tinggi Bulan</label>
                                                <input type="text" class="form-control" name="tinggi_bulan">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Azimuth Matahari</label>
                                                <input type="text" class="form-control" name="azimuth_matahari">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" style="margin-top: 2.5rem;">
                                                <label class="form-label">Azimuth Bulan</label>
                                                <input type="text" class="form-control" name="azimuth_bulan">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Elongasi</label>
                                                <input type="text" class="form-control" name="elongasi">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h6 class="mb-3">Konten Publikasi</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Judul Laporan</label>
                                                <input type="text" class="form-control" name="judul_laporan">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" rows="2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kondisi Cuaca</label>
                                                <textarea class="form-control" name="kondisi_cuaca" rows="2"></textarea>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" name="dipublikasikan"
                                                    id="publishNew" value="1">
                                                <label class="form-check-label" for="publishNew">Publikasikan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- JS Scripts -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
                <script src="https://themesberg.github.io/volt-bootstrap-5-dashboard/assets/js/volt.js"></script>
                <!-- Simplebar -->
                <script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.10/dist/simplebar.min.js"></script>

                <!-- Smooth Scroll -->
                <script
                    src="https://cdn.jsdelivr.net/npm/smooth-scroll@16.1.3/dist/smooth-scroll.polyfills.min.js"></script>

                <!-- On-screen -->
                <script src="https://cdn.jsdelivr.net/npm/on-screen@1.4.0/dist/on-screen.umd.min.js"></script>

                <script>
                    // Auto-fill nama bulan berdasarkan angka Hijriyah
                    document.querySelectorAll('input[name="bulan_hijri"]').forEach(input => {
                        input.addEventListener('change', function () {
                            const monthNames = [
                                '', 'Muharram', 'Safar', 'Rabiul Awal', 'Rabiul Akhir',
                                'Jumadil Awal', 'Jumadil Akhir', 'Rajab', 'Sya\'ban',
                                'Ramadhan', 'Syawal', 'Dzulqaidah', 'Dzulhijjah'
                            ];
                            const monthNumber = parseInt(this.value);
                            if (monthNumber >= 1 && monthNumber <= 12) {
                                const namaBulanField = this.closest('.modal-body')?.querySelector('input[name="nama_bulan"]');
                                if (namaBulanField) {
                                    namaBulanField.value = monthNames[monthNumber];
                                }
                            }
                        });
                    });
                </script>
</body>

</html>