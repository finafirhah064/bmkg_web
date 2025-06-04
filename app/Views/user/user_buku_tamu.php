<!-- Tambahkan Font, Ikon, dan SweetAlert2 -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, rgb(223, 252, 247) 0%, rgb(224, 229, 254) 100%);
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

    .btn-method {
        border-radius: 30px;
        padding: 6px 18px;
        font-size: 14px;
        margin-right: 10px;
        transition: 0.25s ease;
        font-weight: 500;
    }

    .btn-upload {
        background-color: #e3f2fd;
        border: 1px solid #2196f3;
        color: #1976d2;
    }

    .btn-upload:hover {
        background-color: #bbdefb;
    }

    .btn-camera {
        background-color: #e8f5e9;
        border: 1px solid #4caf50;
        color: #2e7d32;
    }

    .btn-camera:hover {
        background-color: #c8e6c9;
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

    video {
        width: 100%;
        border-radius: 12px;
        border: 1px solid #ccc;
    }

    canvas,
    #preview {
        width: 100%;
        border-radius: 12px;
        margin-top: 12px;
    }
</style>

<section class="py-5">
    <div class="container">
        <div class="col-md-8 mx-auto form-container">
            <h2 class="form-title text-center mb-2">Formulir Buku Tamu</h2>
            <p class="form-subtitle text-center mb-4">Silakan isi form berikut saat berkunjung ke BMKG Karangkates.</p>

            <form action="<?= base_url('buku-tamu/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
                </div>

                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi / Asal</label>
                    <input type="text" class="form-control" id="instansi" name="instansi" required>
                </div>

                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <textarea class="form-control" id="kegiatan" name="kegiatan" rows="3" required></textarea>
                </div>

                <!-- Pilih Metode Upload -->
                <div class="mb-3">
                    <label class="form-label">Metode Unggah Foto</label><br>
                    <button type="button" class="btn btn-method btn-upload" onclick="showUpload()">
                        <i class="fas fa-upload me-1"></i> Upload File
                    </button>
                    <button type="button" class="btn btn-method btn-camera" onclick="showCamera()">
                        <i class="fas fa-camera me-1"></i> Gunakan Kamera
                    </button>
                </div>

                <!-- Upload File -->
                <div class="mb-3" id="uploadSection" style="display: none;">
                    <label for="foto_kegiatan" class="form-label">Upload Foto</label>
                    <input type="file" class="form-control" id="foto_kegiatan" name="foto_kegiatan" accept="image/*">
                </div>

                <!-- Kamera -->
                <div class="mb-3" id="cameraSection" style="display: none;">
                    <label class="form-label">Ambil Foto dari Kamera</label>
                    <video id="camera" autoplay playsinline></video>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="takeSnapshot()">
                        <i class="fas fa-camera-retro me-1"></i> Ambil Foto
                    </button>
                    <canvas id="snapshot" style="display: none;"></canvas>
                    <img id="preview" style="display: none;" class="mt-2 img-fluid rounded" />
                    <input type="hidden" id="foto_data" name="foto_data">
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

<script>
    const camera = document.getElementById('camera');
    const canvas = document.getElementById('snapshot');
    const preview = document.getElementById('preview');
    const fotoData = document.getElementById('foto_data');
    let stream;

    function showUpload() {
        document.getElementById('uploadSection').style.display = 'block';
        document.getElementById('cameraSection').style.display = 'none';
        stopCamera();
    }

    function showCamera() {
        document.getElementById('uploadSection').style.display = 'none';
        document.getElementById('cameraSection').style.display = 'block';
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(s => {
                stream = s;
                camera.srcObject = stream;
            })
            .catch(err => alert("Tidak dapat mengakses kamera: " + err.message));
    }

    function stopCamera() {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            stream = null;
        }
    }

    function takeSnapshot() {
        const ctx = canvas.getContext('2d');
        canvas.width = camera.videoWidth;
        canvas.height = camera.videoHeight;
        ctx.drawImage(camera, 0, 0);
        const dataURL = canvas.toDataURL('image/jpeg');
        preview.src = dataURL;
        preview.style.display = 'block';
        fotoData.value = dataURL;
    }

    window.addEventListener("beforeunload", () => stopCamera());
</script>