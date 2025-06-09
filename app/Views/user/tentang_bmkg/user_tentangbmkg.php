<style>
    body {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        font-family: 'Poppins', sans-serif;
    }
</style>
<main>
    <section class="py-5 bg-light">
        <div class="container text-center mb-5">
            <h1 class="fw-bold display-5">Tentang BMKG</h1>
            <p class="text-secondary fs-5">Sejarah, Tugas & Fungsi, Visi, Misi, dan Filosofi Logo BMKG</p>
        </div>

        <div class="container">
            <div class="row g-4">
                <!-- Logo -->
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h4 class="fw-bold"><i class="fa fa-image me-2 text-info"></i>Filosofi Logo BMKG</h4>
                            <p class="mb-2">
                                Logo BMKG terdiri dari lengkungan hijau (daratan), garis biru (lautan dan atmosfer), dan 
                                gelombang putih (data ilmiah) sebagai simbol komitmen BMKG menyebarkan informasi 
                                ilmiah bagi masyarakat.
                            </p>
                            <img src="<?= base_url('assets/img/team/bmkg.jpg') ?>" alt="Logo BMKG" class="img-fluid rounded" style="max-height: 120px;">
                        </div>
                    </div>
                </div>
                <!-- Sejarah -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fw-bold"><i class="fa fa-history me-2 text-primary"></i>Sejarah Singkat</h4>
                            <p>
                                Pengamatan meteorologi dan geofisika di Indonesia pertama kali dilakukan pada tahun 1841. 
                                Seiring perkembangan ilmu dan kebutuhan masyarakat, lembaga ini resmi menjadi BMKG 
                                yang bertugas memberikan informasi cuaca, iklim, gempa bumi, dan tsunami.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Visi -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fw-bold"><i class="fa fa-eye me-2 text-success"></i>Visi</h4>
                            <blockquote class="border-start ps-3 fst-italic text-dark">
                                "Menjadi institusi penyedia informasi meteorologi, klimatologi, kualitas udara, dan geofisika 
                                yang andal, terpercaya, dan berkelas dunia."
                            </blockquote>
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fw-bold"><i class="fa fa-bullseye me-2 text-warning"></i>Misi</h4>
                            <ul class="mb-0">
                                <li>Menyediakan informasi yang cepat, tepat, akurat, luas, dan mudah dipahami.</li>
                                <li>Mengembangkan teknologi observasi dan prediksi berbasis sains dan data.</li>
                                <li>Meningkatkan profesionalisme dan kapasitas SDM di bidang meteorologi dan geofisika.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tugas dan Fungsi -->
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fw-bold"><i class="fa fa-briefcase me-2 text-danger"></i>Tugas & Fungsi</h4>
                            <p>
                                BMKG memiliki tugas pokok dalam pengamatan, analisis, prediksi, dan diseminasi informasi 
                                terkait meteorologi, klimatologi, kualitas udara, dan geofisika. Fungsi utama: pelayanan publik, 
                                dukungan kebijakan, dan mitigasi bencana.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

    <!-- Bootstrap & Font Awesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</main>

