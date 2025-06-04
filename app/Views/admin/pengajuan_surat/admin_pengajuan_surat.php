<main class="content">
    <!-- Top Navbar -->

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between w-100">
                <div class="d-flex align-items-center w-100">

                    <form class="navbar-search form-inline" method="GET" action="<?= base_url('admin/pengajuan_surat') ?>">
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input type="text" name="keyword" class="form-control"
                                placeholder="Cari nama, no HP,..."
                                value="<?= esc($keyword ?? '') ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>


    <!-- Breadcrumb -->
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('pengajuan_surat') ?>">Pengajuan Surat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Pengajuan Surat</h1>
                <p class="mb-0">Data Surat yang diajukan tamu ke BMKG.</p>
            </div>
            <div>
                <a href="<?= base_url('admin/pengajuan_surat/export_excel') ?>" class="btn btn-outline-success d-inline-flex align-items-center me-2">
                    <svg class="icon icon-xs me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-8m0 8l-4-4m4 4l4-4m-9 6h10" />
                    </svg>
                    Export Excel
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengaju</th>
                            <th>No HP</th>
                            <th>Jenis Surat</th>
                            <th>Keperluan</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengajuan as $row): ?>
                            <tr id="row-<?= $row['id_pengajuan_surat'] ?>">
                                <td><?= $no++ ?></td>
                                <td><?= esc($row['nama_pengaju']) ?></td>
                                <td><?= esc($row['no_hp']) ?></td>
                                <td><?= esc($row['jenis_surat']) ?></td>
                                <td><?= esc($row['keperluan']) ?></td>
                                <td>
                                    <?php if ($row['file_surat']): ?>
                                        <a href="<?= base_url('uploads/surat/' . $row['file_surat']) ?>" target="_blank">Lihat File</a>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada</span>
                                    <?php endif; ?>
                                </td>
                                <td class="status-text"><?= esc($row['status']) ?></td>
                                <td><?= esc($row['tanggal_pengajuan']) ?></td>
                                <td>
                                    <button class="btn btn-sm btn-success" onclick="konfirmasiStatus(<?= $row['id_pengajuan_surat'] ?>, 'Disetujui')">Setujui</button>
                                    <button class="btn btn-sm btn-danger" onclick="konfirmasiStatus(<?= $row['id_pengajuan_surat'] ?>, 'Ditolak')">Tolak</button>
                                    <button class="btn btn-sm btn-warning" onclick="konfirmasiStatus(<?= $row['id_pengajuan_surat'] ?>, 'Pending')">Pending</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function konfirmasiStatus(id, status) {
            Swal.fire({
                title: `Yakin ingin mengubah status menjadi "${status}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    ubahStatus(id, status);
                }
            });
        }

        function ubahStatus(id, status) {
            fetch(`<?= base_url('admin/pengajuan_surat/ubah_status_ajax') ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        id: id,
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const row = document.getElementById('row-' + id);
                        row.querySelector('.status-text').textContent = status;
                        Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success');
                    } else {
                        Swal.fire('Gagal', 'Gagal memperbarui status.', 'error');
                    }
                });
        }
    </script>
</main>