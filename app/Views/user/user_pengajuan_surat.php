<?= view('user/user_header'); ?>

<style>
    body {
        background: linear-gradient(135deg, rgb(223, 252, 247) 0%, rgb(224, 229, 254) 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-glass {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        max-width: 700px;
        margin: auto;
        transition: all 0.3s ease-in-out;
    }

    .form-glass:hover {
        transform: scale(1.01);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
    }

    .form-title {
        font-weight: 800;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    .form-floating label {
        color: #6c757d;
    }

    .form-floating input:focus,
    .form-floating textarea:focus,
    .form-select:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    }

    .btn-custom {
        background-color: #4a90e2;
        border: none;
        padding: 12px 35px;
        font-weight: bold;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #357ab8;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(53, 122, 184, 0.3);
    }

    @media (max-width: 576px) {
        .form-glass {
            padding: 25px;
        }
    }
</style>

<section class="py-5">
    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <h2 class="text-center form-title">Form Pengajuan Surat</h2>

        <form action="<?= base_url('pengajuan_surat/simpan') ?>" method="post" enctype="multipart/form-data" class="form-glass">
            <?= csrf_field(); ?>

            <div class="form-floating mb-3">
                <input type="text" name="nama_pengaju" class="form-control" id="namaPengaju" placeholder="Nama Pengaju" required>
                <label for="namaPengaju">Nama Pengaju</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="no_hp" class="form-control" id="noHp" placeholder="08xxxxxxxxxx" required>
                <label for="noHp">No HP</label>
            </div>

            <div class="mb-3">
                <label for="jenisSurat" class="form-label">Jenis Surat</label>
                <select name="jenis_surat" class="form-select" id="jenisSurat" required>
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="Surat Permohonan">Surat Permohonan</option>
                    <option value="Surat Keterangan">Surat Keterangan</option>
                    <option value="Surat Tugas">Surat Tugas</option>
                </select>
            </div>

            <div class="form-floating mb-3">
                <textarea name="keperluan" class="form-control" placeholder="Tuliskan keperluan" id="keperluan" style="height: 120px" required></textarea>
                <label for="keperluan">Keperluan</label>
            </div>

            <div class="mb-3">
                <label for="fileSurat" class="form-label">Upload File Surat (PDF)</label>
                <input type="file" name="file_surat" class="form-control" id="fileSurat" accept="application/pdf" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-custom shadow">Ajukan Surat</button>
            </div>
        </form>
    </div>
</section>

<?= view('user/user_footer'); ?>