<!-- app/Views/user/detail_petir.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Sambaran Petir</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        #map {
            height: 450px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 900px;
        }

        h1 {
            font-size: 2.5rem;
            color: #004e89;
        }

        .detail-header {
            background-color: #004e89;
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .detail-header h2 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .btn-back {
            background-color: #f29425;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            border: none;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #004e89;
        }

        .info-box {
            background-color: #e6f0f8;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-box p {
            font-size: 1.2rem;
            color: #333;
            line-height: 1.6;
        }

        .info-box strong {
            color: #004e89;
        }

        .leaflet-popup-content {
            color: #004e89;
        }

        .custom-div-icon i {
            font-size: 28px;
            color: orange;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <!-- Header -->
        <div class="detail-header mb-4">
            <h2>Detail Sambaran Petir</h2>
            <p>Informasi mengenai sambaran petir di daerah <strong><?= esc($petir['wilayah']); ?></strong></p>
        </div>

        <!-- Tombol Kembali -->
        <div class="mb-4 text-center">
            <a href="<?= base_url('user/petir') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Data Petir
            </a>
        </div>

        <!-- Info Sambaran -->
        <div class="info-box mb-4">
            <p><strong>Jenis Petir:</strong> <?= esc($petir['jenis_petir']); ?></p>
            <p><strong>Waktu Sambaran:</strong> <?= esc($petir['waktu_sambaran']); ?></p>
        </div>

        <!-- Peta -->
        <div id="map"></div>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            var map = L.map('map').setView([<?= $latitude ?>, <?= $longitude ?>], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Marker petir menggunakan ikon Font Awesome
            var lightningIcon = L.divIcon({
                className: 'custom-div-icon',
                html: "<div><i class='fas fa-bolt'></i></div>",
                iconSize: [30, 42],
                iconAnchor: [15, 42],
                popupAnchor: [0, -40]
            });

            L.marker([<?= $latitude ?>, <?= $longitude ?>], { icon: lightningIcon })
                .addTo(map)
                .bindPopup("<b><?= esc($petir['wilayah']); ?></b><br>" +
                    "Jenis Petir: <?= esc($petir['jenis_petir']); ?><br>" +
                    "Waktu: <?= esc($petir['waktu_sambaran']); ?>")
                .openPopup();
        </script>
    </div>
</body>

</html>
