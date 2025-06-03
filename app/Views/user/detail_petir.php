<!-- app/Views/user/detail_petir.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Sambaran Petir</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <style>
        /* Membuat peta penuh dan tampilannya menarik */
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
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <!-- Header Section -->
        <div class="detail-header mb-4">
            <h2>Detail Sambaran Petir</h2>
            <p>Informasi mengenai sambaran petir di daerah <strong><?= $petir['wilayah']; ?></strong></p>
        </div>

        <!-- Kembali ke Halaman Sebelumnya -->
        <div class="mb-4 text-center">
           <a href="<?= base_url('user/petir') ?>" class="btn-back">
    <i class="fas fa-arrow-left"></i> Kembali ke Data Petir
</a>

        </div>

        <!-- Detail Informasi Petir -->
        <div class="info-box mb-4">
            <p><strong>Jenis Petir:</strong> <?= $petir['jenis_petir']; ?></p>
            <p><strong>Waktu Sambaran:</strong> <?= $petir['waktu_sambaran']; ?></p>
        </div>

        <!-- Peta Sambaran Petir -->
        <div id="map"></div>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            // Inisialisasi peta
            var map = L.map('map').setView([<?= $latitude ?>, <?= $longitude ?>], 13);

            // Tambahkan layer peta dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tambahkan marker untuk sambaran petir utama
            L.marker([<?= $latitude ?>, <?= $longitude ?>])
                .addTo(map)
                .bindPopup("<b><?= $petir['wilayah']; ?></b><br>" +
                    "Jenis Petir: <?= $petir['jenis_petir']; ?><br>" +
                    "Waktu: <?= $petir['waktu_sambaran']; ?>")
                .openPopup();
        </script>
    </div>
</body>

</html>
