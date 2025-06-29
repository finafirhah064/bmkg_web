<!-- app/Views/user/user_petir.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Petir - BMKG</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        /* Warna utama BMKG */
        :root {
            --bmkg-blue: #004e89;
            --bmkg-orange: #f29425;
            --bmkg-lightblue: #e6f0f8;
        }

        body {
            background-color: var(--bmkg-lightblue);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1, h3 {
            color: var(--bmkg-blue);
            font-weight: 700;
        }

        /* Card styling */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 6px 15px rgba(0, 78, 137, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(242, 148, 37, 0.35);
        }

        .card-title {
            color: var(--bmkg-blue);
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: #555;
            font-size: 0.95rem;
            min-height: 60px;
        }

        .btn-outline-primary {
            border-color: var(--bmkg-orange);
            color: var(--bmkg-orange);
            font-weight: 600;
            padding: 0.375rem 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-outline-primary:hover {
            background-color: var(--bmkg-orange);
            color: white;
            border-color: var(--bmkg-orange);
            box-shadow: 0 0 10px var(--bmkg-orange);
        }

        /* Section tahun */
        .year-section {
            margin-top: 3rem;
            margin-bottom: 2rem;
            border-left: 5px solid var(--bmkg-orange);
            padding-left: 15px;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-text {
                min-height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-5">
        <h1 class="mb-3 text-center"><i class="fas fa-bolt fa-fw me-2" style="color: var(--bmkg-orange);"></i>Data Petir</h1>
        <p class="text-center text-secondary mb-5 fs-5">Informasi sambaran petir berdasarkan wilayah dan waktu kejadian</p>

        <!-- Alert Success/Error -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Data Table -->
        <div class="row">
            <?php foreach ($dataPetir as $row): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <i class="fas fa-bolt me-1" style="color: var(--bmkg-orange);"></i>
                                <?= htmlspecialchars($row['wilayah']); ?> - <?= htmlspecialchars($row['jenis_petir']); ?>
                            </h5>
                            <p class="text-muted small mb-2">
                                <i class="fas fa-clock me-1" style="color: var(--bmkg-orange);"></i>
                                <?= date('d/m/Y H:i', strtotime($row['waktu_sambaran'])); ?>
                            </p>
                            <p class="card-text flex-grow-1"><?= htmlspecialchars(substr($row['jenis_petir'], 0, 100)); ?>...</p>
                        <!-- app/Views/user/user_petir.php -->
                        <a href="<?= base_url('user/petir/detail/' . $row['id']); ?>" class="btn btn-info btn-sm">
    Lihat Detail <i class="fas fa-bolt"></i>
</a>

</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>