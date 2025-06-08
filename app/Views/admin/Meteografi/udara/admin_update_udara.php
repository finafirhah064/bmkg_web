<main class="content">
    <!-- Breadcrumb & Header -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('dashboard') ?>">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Meteografi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit Tekanan Udara</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between flex-wrap">
            <div class="mb-3">
                <h1 class="h4">Edit Data Tekanan Udara</h1>
                <p class="mb-0">Ubah data tekanan udara dan kelembaban harian.</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form method="POST" action="<?= site_url('tekananudara/update/' . $tekanan->id_tekanan_udara) ?>">
                        <?= csrf_field() ?>
                        <div class="row mb-4">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" class="form-control" name="tgl"
                                           value="<?= date('Y-m-d', strtotime($tekanan->tgl)) ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="tekanan_udara">Tekanan Udara (mb)</label>
                                    <input type="number" step="0.1" class="form-control" name="tekanan_udara"
                                           value="<?= $tekanan->tekanan_udara ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="kelembaban_07">Kelembaban 07:00 (%)</label>
                                    <input type="number" step="0.1" class="form-control" name="kelembaban_07"
                                           value="<?= $tekanan->kelembaban_07 ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kelembaban_13">Kelembaban 13:00 (%)</label>
                                    <input type="number" step="0.1" class="form-control" name="kelembaban_13"
                                           value="<?= $tekanan->kelembaban_13 ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kelembaban_18">Kelembaban 18:00 (%)</label>
                                    <input type="number" step="0.1" class="form-control" name="kelembaban_18"
                                           value="<?= $tekanan->kelembaban_18 ?>">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="kecepatan_rata2">Kecepatan Rata-rata (km/jam)</label>
                                    <input type="number" step="0.1" class="form-control" name="kecepatan_rata2"
                                           value="<?= $tekanan->kecepatan_rata2 ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="arah_terbanyak">Arah Angin Terbanyak</label>
                                    <input type="text" class="form-control" name="arah_terbanyak"
                                           value="<?= $tekanan->arah_terbanyak ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kecepatan_terbesar">Kecepatan Terbesar (knots)</label>
                                    <input type="number" step="0.1" class="form-control" name="kecepatan_terbesar"
                                           value="<?= $tekanan->kecepatan_terbesar ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="arah_kecepatan_terbesar">Arah Kecepatan Terbesar</label>
                                    <input type="text" class="form-control" name="arah_kecepatan_terbesar"
                                           value="<?= $tekanan->arah_kecepatan_terbesar ?>">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
