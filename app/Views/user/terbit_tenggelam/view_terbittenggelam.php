<style>
    .card-custom {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        padding: 30px;
    }

    th {
        background-color: #f0f4f7;
        font-weight: 600;
    }

    body {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        font-family: 'Poppins', sans-serif;
    }

    .bulan {
        background-color: #004e89;
        
    }
</style>

<main>
    <div class="container py-5">
        <div class="card-custom">
            <h2 class="text-center fw-bold mb-4">Data Terbit & Tenggelam Matahari</h2>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bulan fs-6">
                    Bulan <?= isset($dataTerbit[0]) ? date('F Y', strtotime($dataTerbit[0]['tanggal'])) : '-' ?>
                </span>
            </div>
            <?php if (empty($dataTerbit)): ?>
                <div class="alert alert-warning text-center">Data tidak ditemukan.</div>
            <?php else: ?>
                <?php
                // Kelompokkan data berdasarkan tanggal
                $kelompok = [];
                foreach ($dataTerbit as $row) {
                    $kelompok[$row['tanggal']][$row['kecamatan']] = [
                        'terbit' => date('H:i', strtotime($row['waktu_terbit'])),
                        'tenggelam' => date('H:i', strtotime($row['waktu_tenggelam'])),
                    ];
                }

                $kecamatanList = ['Malang', 'Batu', 'Kepanjen', 'Blitar', 'Tulungagung', 'Jember', 'Lumajang', 'Banyuwangi'];
                ?>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered text-center align-middle bg-white">
                        <thead>
                            <tr>
                                <th rowspan="2">Tanggal</th>
                                <?php foreach ($kecamatanList as $kec): ?>
                                    <th colspan="2"><?= $kec ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <?php foreach ($kecamatanList as $kec): ?>
                                    <th>Terbit</th>
                                    <th>Terbenam</th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kelompok as $tanggal => $dataKecamatan): ?>
                                <tr>
                                    <td><?= date('j F Y', strtotime($tanggal)) ?></td>
                                    <?php foreach ($kecamatanList as $kec): ?>
                                        <td><?= $dataKecamatan[$kec]['terbit'] ?? '-' ?></td>
                                        <td><?= $dataKecamatan[$kec]['tenggelam'] ?? '-' ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

<!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>