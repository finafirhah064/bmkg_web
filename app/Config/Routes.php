<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::user_dashboard');
$routes->get('admin/login', 'Login::index');
$routes->post('admin/loginauth', 'Login::auth');
$routes->get('admin/dashboard', 'Home::dashboard');

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



// Routes untuk Administrasi
$routes->get('administrasi', 'Administrasi::index');
$routes->get('administrasi/form_administrasi', 'Administrasi::form_administrasi');
$routes->get('administrasi/form_update_administrasi/(:num)', 'Administrasi::form_update_administrasi/$1');
$routes->post('administrasi/save_administrasi', 'Administrasi::save_administrasi');
$routes->post('administrasi/update_administrasi/(:num)', 'Administrasi::update_administrasi/$1');
$routes->get('administrasi/delete_administrasi/(:num)', 'Administrasi::delete_administrasi/$1');
$routes->get('administrasi/export_excel', 'Administrasi::export_excel');
$routes->post('administrasi/process_upload', 'Administrasi::process_upload');
$routes->post('administrasi/process_upload', 'Administrasi::process_upload');

//buku tamu
$routes->get('buku_tamu', 'BukuTamu::index');
$routes->get('buku_tamu/export_excel', 'BukuTamu::export_excel');

// Routes untuk Pengajuan Surat
$routes->get('pengajuan_surat', 'PengajuanSurat::index');
$routes->get('pengajuan_surat/export_excel', 'PengajuanSurat::export_excel');
$routes->get('pengajuan_surat/ubah_status/(:num)/(:segment)', 'PengajuanSurat::ubah_status/$1/$2');
