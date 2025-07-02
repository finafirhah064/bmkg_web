<?php /* app/Views/user/user_petir.php – tampilan klaster sambaran petir dominan */ ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Klaster Petir Dominan – BMKG</title>

    <!-- Bootstrap & Font‑Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

    <style>
        :root {
            --bmkg-blue:   #004e89;
            --bmkg-light:  #f7faff;
            --bmkg-card:   #ffffff;
        }
        body {
            background: var(--bmkg-light);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        .section-heading {
            text-align: center;
            margin-bottom: 1.25rem;
            font-size: 2.1rem;
            font-weight: 700;
            color: var(--bmkg-blue);
        }
        .section-heading i { color: var(--bmkg-blue); }

        .cluster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap: 1.25rem;
        }
        .cluster-card {
            background: var(--bmkg-card);
            border-radius: 1rem;
            box-shadow: 0 4px 14px rgba(0,0,0,.06);
            padding: 1.25rem 1.4rem;
            display: flex;
            flex-direction: column;
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .cluster-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,.10);
        }
        .cluster-title {
            font-weight: 600;
            font-size: 1.15rem;
            margin-bottom: .6rem;
            background-color: var(--bmkg-blue);
            color: white;
            padding: 10px 14px;
            border-radius: 8px;
            width: 100%;
            text-align: center;
        }
        .cluster-meta {
            font-size: .9rem;
        }
        .cluster-count {
            font-size: .9rem;
            font-weight: bold;
            margin-bottom: .4rem;
        }
        .cluster-dominant strong {
            font-weight: 700;
        }
        .btn-outline-primary.detail-btn {
            margin-top: auto;
            align-self: flex-start;
            border-radius: 50px;
            padding: .45rem 1.1rem;
            font-size: .9rem;
            font-weight: 500;
            color: var(--bmkg-blue);
            border-color: var(--bmkg-blue);
        }
        .btn-outline-primary.detail-btn:hover {
            background-color: var(--bmkg-blue);
            color: white;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <h1 class="section-heading">
        <i class="fas fa-bolt me-2"></i>Klaster Petir
    </h1>
    <p class="text-center text-secondary mb-4">Wilayah dengan frekuensi sambaran tertinggi hasil clustering.</p>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php elseif(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(empty($clusters)): ?>
        <div class="alert alert-info text-center">Belum ada data klaster dominan.</div>
    <?php else: ?>
        <div class="cluster-grid">
            <?php foreach($clusters as $c): ?>
            <div class="cluster-card">
                <div class="cluster-title">
                    <i class="fas fa-bolt me-2"></i><?= esc($c['wilayah']); ?>
                </div>
                <div class="cluster-count">
                    <?= esc($c['count']); ?> sambaran
                </div>
                <div class="cluster-meta mb-2 cluster-dominant">
                    <strong>Jenis dominan:&nbsp;</strong><?= esc($c['jenis_dominan']); ?>
                </div>
                <div class="cluster-meta text-muted mb-3">
                    <i class="fas fa-clock me-1"></i><?= date('d/m/Y H:i', strtotime($c['latest_time'])); ?>
                </div>
                <a href="<?= base_url('user/petir/cluster/'.urlencode($c['wilayah'])); ?>" class="btn btn-outline-primary detail-btn">
                    Lihat Detail Klaster <i class="fas fa-map-marker-alt"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
