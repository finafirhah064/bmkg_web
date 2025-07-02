<?php
$uri = service('uri'); // mengambil instance URI
$segment1 = $uri->getSegment(1); // bagian pertama dari URL (misalnya: 'dashboard', 'administrasi', dll)
$segment2 = service('uri')->getSegment(2);
?>

<nav id="sidebarMenu" class="sidebar d-lg-block collapse" data-simplebar style="background-color:rgb(245, 250, 255);">
  <!-- Di dalam <head> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <div class="sidebar-inner px-3 pt-3">
    <!-- Logo dan Judul -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex align-items-center gap-3 mb-4 px-2">
      <img src="../../assets/img/team/bmkg.jpg" alt="BMKG Logo" width="60" height="60" class="logo">
      <div class="text-start">
        <div class="sidebar-title">Stasiun BMKG<br>Kelas III</div>
        <div class="sidebar-subtitle">Malang</div>
      </div>
    </div>

    <style>
      .sidebar {
        width: 280px;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        z-index: 1000;
        box-shadow: 0 0.125rem 0.25rem rgba(80, 192, 244, 0.79);
        transition: all 0.3s;
        background-color: rgb(106, 173, 240);
        color: #000 !important;
      }

      .sidebar * {
        color: inherit !important;
      }

      .sidebar-title {
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.2;
      }

      .sidebar-subtitle {
        font-size: 0.9rem;
        letter-spacing: 3px;
      }

      .sidebar .nav-link {
        font-weight: 500;
        border-radius: 5px;
        margin: 2px 5px;
        padding: 10px 15px;
        display: flex;
        align-items: center;
        transition: all 0.2s;
        color: #555 !important;
      }

      .sidebar .nav-link:hover {
        background-color: #f0f0f0;
        color: #000 !important;
      }

      .sidebar .nav-link.active {
        background-color: rgb(69, 170, 253);
        color: #000 !important;
        font-weight: 600;
      }

      .sidebar-icon {
        width: 24px;
        display: flex;
        justify-content: center;
      }

      .sidebar-text {
        font-size: 0.95rem;
        margin-left: 10px;
      }

      .multi-level {
        padding-left: 15px;
      }

      @media (max-width: 992px) {
        .sidebar {
          transform: translateX(-100%);
          width: 260px;
        }

        .sidebar.show {
          transform: translateX(0);
        }

        .sidebar-toggle {
          display: block;
          position: fixed;
          left: 10px;
          top: 10px;
          z-index: 1100;
        }
      }
    </style>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebarMenu');
        const toggleBtn = document.createElement('button');
        toggleBtn.className = 'btn btn-primary sidebar-toggle d-lg-none';
        toggleBtn.innerHTML = '☰ Menu';
        document.body.appendChild(toggleBtn);

        toggleBtn.addEventListener('click', function () {
          sidebar.classList.toggle('show');
        });
        toggleBtn.setAttribute('aria-label', 'Toggle sidebar menu');
        // Tutup sidebar saat mengklik di luar
        document.addEventListener('click', function (e) {
          if (!sidebar.contains(e.target) && e.target !== toggleBtn) {
            sidebar.classList.remove('show');
          }
        });
      });
    </script>

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'dashboard') ? 'active' : ''; ?>"
          href="<?= base_url('admin/dashboard'); ?>">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
          </span>
          <span class="sidebar-text">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $segment1 == 'administrasi' ? 'active' : ''; ?>" href="<?= base_url('administrasi'); ?>">
          <span class="sidebar-icon text-dark">
            <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 23 23"
              stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
            </svg>
          </span>
          <span class="sidebar-text">Administrasi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $segment1 == 'buku_tamu' ? 'active' : ''; ?>" href="<?= base_url('buku_tamu'); ?>">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path d="M3 4h18v2H3V4zm0 4h18v2H3V8zm0 4h18v2H3v-2zm0 4h18v2H3v-2z" />
            </svg>
          </span>
          <span class="sidebar-text">Buku Tamu</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'pengajuan_surat') ? 'active' : ''; ?>"
          href="<?= base_url('admin/pengajuan_surat'); ?>">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6 2h9a2 2 0 012 2v2h-2V4H6v16h6v2H6a2 2 0 01-2-2V4a2 2 0 012-2zm10 10l4 4v-3h3l-4-4h-3v3z" />
            </svg>
          </span>
          <span class="sidebar-text">Pengajuan Surat</span>
        </a>
      </li>

      <!-- 
      Contoh perbaikan untuk menu GEMPA -->
      <!-- <li class="nav-item">
        <a href="<?php echo base_url('Gempa'); ?>"
          class="nav-link d-flex align-items-center <?= $segment1 == 'Gempa' ? 'active' : ''; ?>">
          <span class="sidebar-icon me-3">
            <svg class="icon icon-xs" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
          </span>
          <span class="sidebar-text">Gempa</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
          href="#submenu-hilal" role="button" aria-expanded="false" aria-controls="submenu-hilal">
          <span class="d-flex align-items-center">
            <span class="sidebar-icon me-3">
              <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 23 23" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
              </svg>
            </span>
            <span class="sidebar-text">Hilal</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </a>
        <div class="multi-level collapse" role="list" id="submenu-hilal">
          <ul class="flex-column nav">
            <li class="nav-item">
              <a href="<?php echo base_url('hilal'); ?>"
                class="nav-link ps-4 <?= $segment1 == 'hilal' ? 'active' : ''; ?>">
                <span class="sidebar-text">Data Hilal</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-4" href="<?php echo base_url('hilal/gambar'); ?>">
                <span class="sidebar-text">Gambar Hilal</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <!-- Meteografi with dropdown -->
        <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
          href="#submenu-meteografi" role="button" aria-expanded="false" aria-controls="submenu-meteografi">
          <span class="d-flex align-items-center">
            <span class="sidebar-icon me-3">
              <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 23 23" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 15a4.5 4.5 0 0 0 4.5 4.5H18a3.75 3.75 0 0 0 1.332-7.257 3 3 0 0 0-3.758-3.848 5.25 5.25 0 0 0-10.233 2.33A4.502 4.502 0 0 0 2.25 15Z" />
              </svg>
            </span>
            <span class="sidebar-text">Meteografi</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </span>
        </a>
        <div class="multi-level collapse" role="list" id="submenu-meteografi">
          <ul class="flex-column nav">
            <li class="nav-item">
              <a href="<?php echo base_url('Temperatur'); ?>"
                class="nav-link d-flex align-items-center <?= $segment1 == 'Temperatur' ? 'active' : ''; ?>">
                <span class="sidebar-text">Temperatur</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('tekananudara'); ?>"
                class="nav-link d-flex align-items-center <?= $segment1 == 'tekananudara' ? 'active' : ''; ?>">
                <span class="sidebar-text">Udara</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <!-- Petir -->
        <a href="<?php echo base_url('Petir'); ?>"
          class="nav-link d-flex align-items-center <?= $segment1 == 'Petir' ? 'active' : ''; ?>">
          <span class="sidebar-icon me-3">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 23 23" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
            </svg>
          </span>
          <span class="sidebar-text">Petir</span>
        </a>
      </li>

      <li class="nav-item">
        <!-- Terbit Tenggelam -->
        <a class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'terbit-tenggelam') ? 'active' : ''; ?>"
          href="<?= base_url('admin/terbit-tenggelam'); ?>">
          <span class="sidebar-icon me-3">
            <svg class="icon icon-xs" fill="currentColor" stroke="currentColor" stroke-width="1.5" viewBox="0 0 23 23"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 3v1.5m0 15V21m9-9h-1.5M3 12H1.5m16.364 6.364l-1.06-1.06M6.343 6.343L5.282 5.282m0 13.435l1.06-1.06M18.364 5.636l-1.06 1.06M12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
          </span>
          <span class="sidebar-text">Terbit Tenggelam</span>
        </a>
      </li>

      <li class="nav-item">
        <!-- Berita Kegiatan -->
        <a href="<?php echo base_url('beritakegiatan'); ?>"
          class="nav-link d-flex align-items-center <?= $segment1 == 'beritakegiatan' ? 'active' : ''; ?>">
          <span class="sidebar-icon me-3">
            <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 23"
              stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
          </span>
          <span class="sidebar-text">Berita Kegiatan</span>
        </a>
      </li>
      <!-- Garis pemisah -->
      <hr class="my-3 border-top border-secondary">

      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'logout') ? 'active' : ''; ?>"
          href="<?= base_url('admin/logout'); ?>">
          <span class="sidebar-icon me-3">
            <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H3" />
            </svg>
          </span>
          <span class="sidebar-text">Logout</span>
        </a>
      </li>
    </ul>
  </div>
</nav>