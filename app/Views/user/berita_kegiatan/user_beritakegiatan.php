<style>
    body {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        font-family: 'Poppins', sans-serif;
    }
</style>
<main>
    <section>
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Berita Kegiatan & Pengumuman</h2>
                <p class="text-muted">Informasi terbaru dari kegiatan dan pengamatan yang dilakukan oleh BMKG.</p>
            </div>

            <!-- Tab Navigation -->
            <div class="mb-4 d-flex justify-content-center">
                <ul class="nav nav-pills gap-2" id="beritaTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-birutua rounded-pill px-4 py-2 active" id="berita-tab"
                            data-bs-toggle="pill" data-bs-target="#berita" type="button" role="tab"
                            aria-controls="berita" aria-selected="true">
                            Berita Baru
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-birutua rounded-pill px-4 py-2" id="pengumuman-tab"
                            data-bs-toggle="pill" data-bs-target="#pengumuman" type="button" role="tab"
                            aria-controls="pengumuman" aria-selected="false">
                            Pengumuman
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="beritaTabContent">
                    <div class="tab-pane fade show active" id="berita" role="tabpanel" aria-labelledby="berita-tab">
                        <div class="row">
                            <?php
                            $ada_pengumuman = false;
                            foreach ($berita as $item):
                                if ($item['kategori'] == 'Berita Kegiatan'):
                                    $ada_pengumuman = true;
                                    ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <a href="<?= base_url('user/berita/' . $item['id_berita']) ?>"
                                        class="text-decoration-none text-dark">
                                        <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                                            <img src="<?= base_url('/uploads/berita/' . $item['gambar']) ?>"
                                                class="berita-img" alt="Gambar Berita">
                                            <div class="card-body">
                                                <h5 class="card-title fw-semibold"><?= esc($item['judul']) ?></h5>
                                                <p class="text-muted small">
                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                    <?= date('d M Y', strtotime($item['tanggal'])) ?>
                                                </p>
                                                <p class="card-text">
                                                    <?= esc(substr(strip_tags($item['isi']), 0, 90)) ?>...
                                                </p>
                                                <a href="<?= base_url('user/berita/' . $item['id_berita']) ?>"
                                                    class="btn btn-outline-primary rounded-pill btn-sm mt-3 mb-3">
                                                    Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
                        <!-- Isi pengumuman di sini -->
                        <div class="row">
                            <?php
                            $ada_pengumuman = false;
                            foreach ($berita as $item):
                                if ($item['kategori'] == 'Pengumuman'):
                                    $ada_pengumuman = true;
                                    ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <a href="<?= base_url('user/berita/' . $item['id_berita']) ?>"
                                        class="text-decoration-none text-dark">
                                        <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                                            <img src="<?= base_url('/uploads/berita/' . $item['gambar']) ?>"
                                                class="berita-img" alt="Gambar Berita">
                                            <div class="card-body">
                                                <h5 class="card-title fw-semibold"><?= esc($item['judul']) ?></h5>
                                                <p class="text-muted small">
                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                    <?= date('d M Y', strtotime($item['tanggal'])) ?>
                                                </p>
                                                <p class="card-text">
                                                    <?= esc(substr(strip_tags($item['isi']), 0, 90)) ?>...
                                                </p>
                                                <a href="<?= base_url('user/berita/' . $item['id_berita']) ?>"
                                                    class="btn btn-outline-primary rounded-pill btn-sm mt-3 mb-3">
                                                    Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</main>