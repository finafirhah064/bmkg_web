<style>
    body {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        font-family: 'Poppins', sans-serif;
    }
</style>

<main>
    <section>
        <div class="container py-5">
            <div class="card shadow rounded-4 p-4">
                <!-- Judul besar -->
                <h1 class="fw-bold text-dark mb-3" style="font-size: 2rem;">
                    <?= esc($berita['judul']) ?>
                </h1>

                <!-- Metadata -->
                <div class="mb-4 text-muted" style="font-size: 1rem;">
                    <i class="fas fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($berita['tanggal'])) ?>
                    &nbsp; | &nbsp;
                    <i class="fas fa-user-edit me-1"></i> Admin
                    &nbsp; | &nbsp;
                    <i class="fas fa-tag me-1"></i> <?= esc($berita['kategori']) ?>
                </div>

                <!-- Gambar -->
                <?php if (!empty($berita['gambar'])): ?>
                    <div class="text-center mb-4">
                        <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" alt="Gambar"
                            class="img-fluid rounded shadow-sm" style="max-height: 480px;">
                    </div>
                <?php endif; ?>

                <!-- Isi Konten -->
                <div class="text-dark" style="font-size: 1.2rem; line-height: 1.9;">
                    <?= nl2br($berita['isi']) ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>