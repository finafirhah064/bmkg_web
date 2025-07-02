<main class="content">
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#">Administrasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Tambah</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Data Mahasiswa</h1>
            </div>
            <div>

                <script>
                    function triggerUpload() {
                        const input = document.getElementById('fileInput');
                        input.click();

                        input.onchange = function () {
                            const file = input.files[0];
                            if (!file) {
                                alert('Silakan pilih file terlebih dahulu.');
                                return;
                            }

                            const allowedTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'];
                            if (!allowedTypes.includes(file.type)) {
                                alert('Format file tidak valid. Harap unggah file Excel (.xls, .xlsx, .csv).');
                                input.value = ''; // reset input
                                return;
                            }

                            document.getElementById('uploadForm').submit();
                        };
                    }
                </script>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form method="POST" action="<?= site_url('administrasi/save') ?>" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" required>
                                </div>
                                <div class="mb-4">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="mb-4">
                                    <label for="universitas">Universitas</label>
                                    <input type="text" class="form-control" name="universitas" required>
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <select name="jenis_kegiatan" class="form-control" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="PKL">PKL</option>
                                        <option value="Skripsi">Skripsi</option>
                                        <option value="Kunjungan">Kunjungan</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="judul">Judul Laporan</label>
                                    <input type="text" class="form-control" name="judul">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="pembimbing">Pembimbing</label>
                                    <input type="text" class="form-control" name="pembimbing">
                                </div>
                                <div class="mb-4">
                                    <label for="stasiun_divisi">Stasiun/Divisi</label>
                                    <input type="text" class="form-control" name="stasiun_divisi">
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" required>
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" required>
                                </div>
                                <div class="mb-4">
                                    <label for="file_laporan">Upload Laporan</label>
                                    <input type="file" class="form-control" name="file_laporan"
                                        accept=".pdf,.doc,.docx">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="../../vendor/notyf/notyf.min.js"></script>
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../../assets/js/volt.js"></script>