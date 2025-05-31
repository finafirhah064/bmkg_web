<!-- app/Views/user/user_hilal.php -->
<!DOCTYPE html>
<html lang="id">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Pengamatan Hilal - BMKG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <h1 class="h4">Data Pengamatan Hilal</h1>
        <p class="mb-4">Tampilan data pengamatan hilal berdasarkan tahun.</p>

        <!-- Loop per Tahun Hijriyah -->
        <?php foreach ($pengamatanByYear as $year => $dataByYear): ?>
            <h3 class="mt-4 mb-3"><?= $year; ?> H</h3>
            <div class="row">
                <!-- Loop untuk data hilal per tahun -->
                <?php foreach ($dataByYear as $item): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark"><?= $item['nama_bulan']; ?> <?= $item['bulan_hijri']; ?></h5>
                                <p class="text-muted small"><i class="fas fa-calendar-alt me-1"></i> <?= date('d/m/Y', strtotime($item['tanggal_observasi'])); ?></p>
                                <p class="card-text"><?= substr($item['deskripsi'], 0, 100); ?>...</p>
                                <a href="<?= base_url('user/hilal/detail/' . $item['id_pengamatan_hilal']); ?>" class="btn btn-outline-primary rounded-pill btn-sm">Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
