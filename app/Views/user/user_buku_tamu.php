<!-- Tambahkan Font, Ikon, dan SweetAlert2 -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #dffcf7, #e0e5fe);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .form-title {
        color: #001233;
        font-weight: 700;
    }

    .form-subtitle {
        color: #6c757d;
        font-size: 15px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .btn-submit {
        background-color: #0060df;
        color: #fff;
        padding: 10px 30px;
        font-size: 16px;
        border-radius: 30px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #004aad;
    }

    .form-control,
    textarea {
        border-radius: 12px !important;
    }
</style>

<section class="py-5">
    <div class="container">
        <div class="col-md-8 mx-auto form-container">
            <h2 class="form-title text-center mb-2">Formulir Buku Tamu</h2>
            <p class="form-subtitle text-center mb-4">Silakan isi form berikut saat berkunjung ke BMKG Karangkates.</p>

            <form action="<?= base_url('buku_tamu/simpan') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi / Asal</label>
                    <input type="text" class="form-control" id="instansi" name="instansi" required>
                </div>

                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <textarea class="form-control" id="kegiatan" name="kegiatan" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" required>
                </div>

                <div class="mb-3">
                    <label for="waktu_kunjungan" class="form-label">Waktu Kunjungan</label>
                    <input type="time" class="form-control" id="waktu_kunjungan" name="waktu_kunjungan" required>
                </div>

                <div class="mb-3">
                    <label for="kesan" class="form-label">Kesan & Pesan</label>
                    <textarea class="form-control" id="kesan" name="kesan" rows="3" required></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Buku Tamu
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata("success") ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Oke'
        });
    </script>
<?php endif; ?>