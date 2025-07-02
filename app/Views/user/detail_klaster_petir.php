<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($title); ?></title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map{height:450px;width:100%;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,.2);}
    </style>
</head>
<body>
<div class="container mt-4 mb-5">
    <h2 class="mb-3"><i class="fas fa-bolt me-2" style="color:#f29425;"></i><?= esc($wilayah); ?></h2>
    <p class="text-muted">Total sambaran: <?= count($points); ?></p>

    <!-- Peta -->
    <div id="map"></div>

    <!-- Daftar tabel titik -->
    <table class="table mt-4">
        <thead>
            <tr><th>#</th><th>Jenis</th><th>Tanggal/Waktu</th><th>Lat</th><th>Lon</th></tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($points as $p): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= esc($p['jenis_petir']); ?></td>
                <td><?= esc($p['waktu_sambaran']); ?></td>
                <td><?= esc($p['latitude']); ?></td>
                <td><?= esc($p['longitude']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([<?= $centerLat ?>, <?= $centerLon ?>], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var lightningIcon = L.divIcon({
        html:'<i class=\"fas fa-bolt\" style=\"color:#f29425;font-size:20px\"></i>',
        className:'', iconSize:[20,20], iconAnchor:[10,10]
    });

    <?php foreach($points as $p): ?>
        L.marker([<?= $p['latitude'];?>, <?= $p['longitude'];?>], {icon: lightningIcon})
         .addTo(map)
         .bindPopup("<?= esc($p['jenis_petir']); ?><br><?= esc($p['waktu_sambaran']); ?>");
    <?php endforeach; ?>
</script>
</body>
</html>
