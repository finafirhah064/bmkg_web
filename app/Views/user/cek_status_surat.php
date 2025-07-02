<?= view('user/user_header'); ?>

<!-- Tambahkan Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        font-family: 'Poppins', sans-serif;
    }

    .custom-container {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }

    .form-control {
        border-radius: 10px;
        font-size: 14px;
    }

    .btn-success {
        background-color: #198754;
        border: none;
        font-weight: 500;
        font-size: 14px;
    }

    .btn-success:hover {
        background-color: #157347;
    }

    .table th {
        background-color: #f0f4f7;
        font-weight: 600;
    }

    .badge {
        font-size: 13px;
        padding: 6px 12px;
        border-radius: 20px;
    }

    .badge-success {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .badge-danger {
        background-color: #f8d7da;
        color: #842029;
    }

    .badge-warning {
        background-color: #fff3cd;
        color: #664d03;
    }

    .badge-secondary {
        background-color: #e2e3e5;
        color: #41464b;
    }
</style>

<section class="py-5">
    <div class="container">
        <div class="custom-container">
            <h3 class="text-center fw-bold text-dark mb-4">Cek Status Pengajuan Surat</h3>

            <!-- Form Pencarian -->
            <form action="<?= base_url('cek_status_surat') ?>" method="get" class="mb-4">
                <div class="row g-2 align-items-end">
                    <div class="col-md-9">
                        <label for="keyword" class="form-label">Masukkan Nama Pengaju</label>
                        <input type="text" name="keyword" id="keyword" class="form-control"
                            placeholder="Contoh: Dinda Ayu Permata" value="<?= esc($keyword ?? '') ?>">
                    </div>
                    <div class="col-md-3 text-end">
                        <button type="submit" class="btn btn-success w-100"><i class="fa fa-search me-1"></i> Cari
                            Status</button>
                    </div>
                </div>
            </form>

            <!-- Tabel Hasil -->
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover align-middle bg-white rounded">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($surats)): ?>
                            <?php $no = 1;
                            foreach ($surats as $surat): ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= esc($surat['nama_pengaju']) ?></td>
                                    <td><?= esc($surat['jenis_surat']) ?></td>
                                    <td><?= esc($surat['keperluan']) ?></td>
                                    <td class="text-center">
                                        <?php
                                        $badgeClass = match ($surat['status']) {
                                            'Disetujui' => 'success',
                                            'Ditolak' => 'danger',
                                            'Pending' => 'warning',
                                            default => 'secondary',
                                        };
                                        ?>
                                        <span class="badge badge-<?= $badgeClass ?>"><?= esc($surat['status']) ?></span>
                                    </td>
                                    <td class="text-center"><?= date('d-m-Y', strtotime($surat['tanggal_pengajuan'])) ?></td>

                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= view('user/user_footer'); ?>