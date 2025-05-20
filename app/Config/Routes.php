<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('user/dashboard', 'Home::user_dashboard');

// Terbit Tenggelam
$routes->get('TerbitTenggelam', 'Terbit_Tenggelam::view_terbit_tenggelam');
$routes->get('/Home/updateterbittenggelam/(:num)', 'Terbit_Tenggelam::form_update_terbit_tenggelam/$1');
$routes->post('Home/updateterbittenggelam/(:num)', 'Terbit_Tenggelam::update_terbit_tenggelam/$1');
$routes->post('Home/terbit_tenggelam', 'Terbit_Tenggelam::save_terbit_tenggelam');
$routes->get('/Home/deleteterbittenggelam/(:num)', 'Terbit_Tenggelam::delete_terbit_tenggelam/$1');
$routes->get('FormTerbitTenggelam', 'Terbit_Tenggelam::form_terbit_tenggelam');
$routes->post('TerbitTenggelam/process_upload', 'Terbit_Tenggelam::process_upload');

// tekanan_udara
$routes->get('admin_tekanan_udara', 'tekanan_udara::tampil_tekanan_udara');

//Berita Kegiatan
$routes->get('BeritaKegiatan', 'Berita_Kegiatan::view_beritakegiatan');
$routes->get('form/BeritaKegiatan', 'Berita_Kegiatan::form_beritakegiatan');
$routes->post('add/BeritaKegiatan', 'Berita_Kegiatan::save_beritakegiatan');
$routes->get('delete/BeritaKegiatan/(:num)', 'Berita_Kegiatan::delete_beritakegiatan/$1');
$routes->get('/update/FormBeritaKegiatan/(:num)', 'Berita_Kegiatan::form_update_beritakegiatan/$1');
$routes->post('update/BeritaKegiatan/(:num)', 'Berita_Kegiatan::update_beritakegiatan/$1');

// Hilal Routes - PASTIKAN PENULISAN 'hilal' KONSISTEN
$routes->get('Hilal', 'Home::hilal'); // GET /hilal
$routes->post('hilal/simpan', 'Home::simpan_hilal');
$routes->post('hilal/update/(:num)', 'Home::update_hilal/$1');
$routes->get('hilal/delete/(:num)', 'Home::delete_hilal/$1');
$routes->get('hilal/gambar/(:num)', 'Home::gambar_hilal/$1');
$routes->post('hilal/upload-gambar', 'Home::upload_gambar_hilal');
$routes->get('hilal/delete-gambar/(:num)', 'Home::delete_gambar_hilal/$1');

// Routes untuk Mahasiswa
$routes->group('mahasiswa', function ($routes) {
    $routes->get('', 'Admin\Mahasiswa::index');
    $routes->get('tambah', 'Admin\Mahasiswa::tambah');
    $routes->post('simpan', 'Admin\Mahasiswa::simpan');
    $routes->get('edit/(:num)', 'Admin\Mahasiswa::edit/$1');
    $routes->post('update/(:num)', 'Admin\Mahasiswa::update/$1');
    $routes->get('hapus/(:num)', 'Admin\Mahasiswa::hapus/$1');

    $routes->get('export', 'Admin\Mahasiswa::export');
    $routes->get('export/bulanan', 'Admin\Mahasiswa::exportBulanan');
    $routes->get('export/tahunan', 'Admin\Mahasiswa::exportTahunan');

    $routes->get('log-ekspor', 'Admin\Mahasiswa::logEkspor');
});

// Routes untuk Pengajuan Surat langsung di sini, tanpa group admin lagi
$routes->get('pengajuan_surat', 'Admin\PengajuanSurat::list'); // URL: /admin/pengajuan_surat
$routes->get('pengajuan_surat/approve/(:num)', 'Admin\PengajuanSurat::approve/$1');
$routes->get('pengajuan_surat/reject/(:num)', 'Admin\PengajuanSurat::reject/$1');
$routes->get('pengajuan_surat/download/(:segment)', 'Admin\PengajuanSurat::download/$1');
$routes->get('pengajuan_surat/export', 'Admin\PengajuanSurat::export');

// Alias ke Mahasiswa::index
$routes->get('administrasi', 'Admin\Mahasiswa::index');
