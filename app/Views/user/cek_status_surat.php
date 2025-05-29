<?= view('user/user_header'); ?>

<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Cek Status Pengajuan Surat</h2>

        <!-- Form Pencarian -->
        <form action="<?= base_url('cek_status_surat') ?>" method="post" class="shadow-sm p-4 rounded bg-white mb-4">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="nama_pengaju" class="form-label">Masukkan Nama Pengaju</label>
                <input type="text" name="nama_pengaju" id="nama_pengaju" class="form-control" placeholder="Contoh: Dinda Ayu Permata" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success px-4">Cari Status</button>
            </div>
        </form>

        <!-- Hasil Pencarian -->
        <?php if (isset($surats)): ?>
            <?php if (count($surats) > 0): ?>
                <div class="table-responsive shadow-sm">
                    <table class="table table-bordered table-hover align-middle bg-white rounded">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Surat</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                                <th>File Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($surats as $surat): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($surat['nama_pengaju']) ?></td>
                                    <td><?= esc($surat['jenis_surat']) ?></td>
                                    <td><?= esc($surat['keperluan']) ?></td>
                                    <td>
                                        <?php
                                        $badgeClass = match ($surat['status']) {
                                            'Disetujui' => 'success',
                                            'Ditolak' => 'danger',
                                            'Pending' => 'warning',
                                            default => 'secondary',
                                        };
                                        ?>
                                        <span class="badge bg-<?= $badgeClass ?>"><?= esc($surat['status']) ?></span>
                                    </td>
                                    <td><?= date('d-m-Y H:i', strtotime($surat['tanggal_pengajuan'])) ?></td>
                                    <td>
                                        <?php if (!empty($surat['file_surat'])): ?>
                                            <a href="<?= base_url('uploads/surat/' . $surat['file_surat']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">Lihat</a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    Tidak ditemukan pengajuan surat atas nama tersebut.
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
</section>

<?= view('user/user_footer'); ?>