<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($title); ?></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f2f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #003366;
        }

        /* Header dengan gambar latar langit malam */
        .header-detail {
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            padding: 3rem 1rem;
            border-radius: 0 0 1rem 1rem;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            position: relative;
        }

        .header-detail {
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            padding: 5rem 1rem 3rem 6.5rem;
            /* Tambah padding kiri buat space ikon */
            border-radius: 0 0 1rem 1rem;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            position: relative;
            min-height: 180px;
            /* Supaya cukup tinggi */
        }

        .header-detail .moon-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            font-size: 6rem;
            color: #f29425dd;
            filter: drop-shadow(1px 1px 2px #0009);
            user-select: none;
            opacity: 0.85;
            pointer-events: none;
        }


        /* Card styling */
        .card-detail {
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgb(0 78 137 / 15%);
            margin-top: -3rem;
            padding: 2rem;
            background: white;
            position: relative;
            z-index: 2;
        }

        /* Gambar observasi */
        .img-observasi {
            max-height: 350px;
            object-fit: contain;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgb(242 148 37 / 25%);
            margin-bottom: 1.5rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Tombol kembali */
        .btn-primary-custom {
            background-color: #f29425;
            border: none;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            background-color: #d87e04;
            box-shadow: 0 0 15px #d87e04;
        }

        /* Ilustrasi info tambahan */
        .info-icon {
            font-size: 1.5rem;
            color: #f29425;
            margin-right: 0.5rem;
        }

        /* List info */
        ul.info-list li {
            margin-bottom: 0.6rem;
            line-height: 1.4;
        }
    </style>
</head>

<body>
    <div class="container my-5 shadow-sm rounded">

        <div class="header-detail position-relative">
            <i class="fas fa-moon crescent moon-icon"></i>
            <h2><?= htmlspecialchars($laporan['judul_laporan']); ?></h2>
            <p class="lead fst-italic mt-2">Detail lengkap pengamatan hilal dan kondisi langit malam</p>
        </div>

        <div class="card-detail">
            <h4><i class="fas fa-info-circle info-icon"></i>Informasi Observasi</h4>
            <ul class="list-unstyled info-list">
                <li><strong>Tanggal Observasi:</strong>
                    <?= date('l, d F Y', strtotime($laporan['tanggal_observasi'])); ?></li>
                <li><strong>Bulan Hijriyah:</strong> <?= htmlspecialchars($laporan['bulan_hijri']); ?>
                    (<?= htmlspecialchars($laporan['nama_bulan']); ?>)</li>
                <li><strong>Lokasi:</strong> <?= htmlspecialchars($laporan['lokasi']); ?>
                    (<?= htmlspecialchars($laporan['latitude']); ?>, <?= htmlspecialchars($laporan['longitude']); ?>)
                </li>
                <li><strong>Status Visibilitas:</strong>
                    <?= ucfirst(htmlspecialchars($laporan['status_visibilitas'])); ?></li>
                <li><strong>Tinggi Hilal:</strong> <?= htmlspecialchars($laporan['tinggi_bulan']); ?>°</li>
                <li><strong>Waktu Terbenam Matahari:</strong>
                    <?= htmlspecialchars($laporan['waktu_terbenam_matahari']); ?></li>
                <li><strong>Waktu Terbenam Bulan:</strong> <?= htmlspecialchars($laporan['waktu_terbenam_bulan']); ?>
                </li>
                <li><strong>Azimuth Matahari:</strong> <?= htmlspecialchars($laporan['azimuth_matahari']); ?></li>
                <li><strong>Azimuth Bulan:</strong> <?= htmlspecialchars($laporan['azimuth_bulan']); ?></li>
                <li><strong>Elongasi:</strong> <?= htmlspecialchars($laporan['elongasi']); ?></li>
            </ul>

            <h4 class="mt-4"><i class="fas fa-pen-nib info-icon"></i>Deskripsi Pengamatan</h4>
            <p><?= nl2br(htmlspecialchars($laporan['deskripsi'])); ?></p>

            <h4 class="mt-4"><i class="fas fa-cloud-sun info-icon"></i>Kondisi Cuaca</h4>
            <p><?= nl2br(htmlspecialchars($laporan['kondisi_cuaca'])); ?></p>

            <?php if (!empty($laporan['gambar'])): ?>
                <h4 class="mt-4"><i class="fas fa-image info-icon"></i>Gambar Observasi</h4>
                <img src="<?= htmlspecialchars($laporan['gambar']); ?>" alt="Gambar Pengamatan Hilal"
                    class="img-fluid img-observasi" />
            <?php endif; ?>

            <a href="<?= base_url('user/hilal'); ?>" class="btn btn-primary btn-primary-custom mt-4">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Pengamatan
            </a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>