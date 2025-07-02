<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap & Volt Admin CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://themesberg.github.io/volt-bootstrap-5-dashboard/assets/css/volt.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .chart-container {
            position: relative;
            height: 400px;
        }
    </style>
</head>

<body>
    <main class="content">
        <div class="container-fluid py-4">
            <div class="row">
                <?php
                $cards = [
                    ['label' => 'Tekanan Udara', 'jumlah' => $jml_tekananudara, 'color' => 'primary', 'icon' => 'fa-tachometer-alt'],
                    ['label' => 'Temperatur', 'jumlah' => $jml_temperatur, 'color' => 'danger', 'icon' => 'fa-temperature-high'],
                    ['label' => 'Berita', 'jumlah' => $jml_berita, 'color' => 'info', 'icon' => 'fa-newspaper'],
                    ['label' => 'Gambar Hilal', 'jumlah' => $jml_gambarhilal, 'color' => 'warning', 'icon' => 'fa-moon'],
                    ['label' => 'Login', 'jumlah' => $jml_login, 'color' => 'success', 'icon' => 'fa-user-lock'],
                    ['label' => 'Pengamatan Hilal', 'jumlah' => $jml_pengamatanhilal, 'color' => 'dark', 'icon' => 'fa-binoculars'],
                    ['label' => 'Petir', 'jumlah' => $jml_petir, 'color' => 'orange', 'icon' => 'fa-bolt'],
                    ['label' => 'Terbit/Tenggelam', 'jumlah' => $jml_terbit, 'color' => 'teal', 'icon' => 'fa-sun'],
                    ['label' => 'Pengamatan', 'jumlah' => $jml_pengamatan, 'color' => 'purple', 'icon' => 'fa-eye']
                ];
                ?>

                <?php foreach ($cards as $card): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fa <?= $card['icon'] ?> fa-2x text-<?= $card['color'] ?>"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fw-semibold"><?= $card['label'] ?></h6>
                                    <h4 class="mb-0 fw-bold text-dark"><?= $card['jumlah'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Chart -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">Statistik Data</h5>
                    <div class="chart-container">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        const dashboardChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Tekanan Udara', 'Temperatur', 'Berita', 'Gambar Hilal',
                    'Login', 'Pengamatan Hilal', 'Petir', 'Terbit/Tenggelam', 'Pengamatan'
                ],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [
                        <?= $jml_tekananudara ?>,
                        <?= $jml_temperatur ?>,
                        <?= $jml_berita ?>,
                        <?= $jml_gambarhilal ?>,
                        <?= $jml_login ?>,
                        <?= $jml_pengamatanhilal ?>,
                        <?= $jml_petir ?>,
                        <?= $jml_terbit ?>,
                        <?= $jml_pengamatan ?>
                    ],
                    backgroundColor: [
                        '#0d6efd', '#dc3545', '#0dcaf0', '#ffc107', '#198754',
                        '#6c757d', '#fd7e14', '#20c997', '#6f42c1'
                    ],
                    borderColor: '#dee2e6',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
