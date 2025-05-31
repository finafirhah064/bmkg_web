    <main>
        <!-- Berita Kegiatan -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-dark">Berita Kegiatan</h2>
                    <p class="text-muted" style="color:rgb(0, 43, 86) !important;">Informasi terbaru dari kegiatan dan pengamatan yang dilakukan oleh BMKG.</p>
                </div>
<div class="row">
    <?php foreach ($berita as $item): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="<?= base_url('uploads/berita/' . $item['gambar']) ?>" class="berita-img" alt="Gambar Berita">
                <div class="card-body">
                    <h5 class="card-title fw-semibold text-dark"><?= esc($item['judul']) ?></h5>
                    <p class="text-muted small">
                        <i class="fas fa-calendar-alt me-1"></i>
                        <?= date('d M Y', strtotime($item['tanggal'])) ?>
                    </p>
                    <p class="card-text">
    <?= esc(substr(strip_tags($item['isi']), 0, 100)) ?>...
</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill btn-sm">
                        Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

            </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>