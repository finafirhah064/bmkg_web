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



//Berita Kegiatan
$routes->get('BeritaKegiatan', 'Berita_Kegiatan::view_beritakegiatan');
$routes->get('form/BeritaKegiatan', 'Berita_Kegiatan::form_beritakegiatan');
$routes->post('add/BeritaKegiatan', 'Berita_Kegiatan::save_beritakegiatan');
$routes->get('delete/BeritaKegiatan/(:num)', 'Berita_Kegiatan::delete_beritakegiatan/$1');
$routes->get('/update/FormBeritaKegiatan/(:num)', 'Berita_Kegiatan::form_update_beritakegiatan/$1');
$routes->post('update/BeritaKegiatan/(:num)', 'Berita_Kegiatan::update_beritakegiatan/$1');

// Hilal Routes - PASTIKAN PENULISAN 'hilal' KONSISTEN
$routes->get('hilal', 'Home::hilal');
$routes->get('Hilal', 'Home::hilal');
$routes->post('hilal/simpan', 'HilalController::simpan_hilal');
$routes->post('hilal/update/(:num)', 'HilalController::update_hilal/$1');
$routes->get('hilal/delete/(:num)', 'HilalController::delete_hilal/$1');
$routes->get('hilal/downloadExcel', 'HilalController::downloadExcel');
$routes->post('hilal/uploadExcel', 'HilalController::uploadExcel');
// app/Config/Routes.php

$routes->get('user/hilal', 'UserController::hilal');  // Menampilkan data hilal untuk user
$routes->get('user/hilal/detail/(:segment)', 'UserController::detail/$1'); // Menampilkan detail pengamatan hilal


// Temperatur Routes 
$routes->group('Temperatur', function ($routes) {
    $routes->get('/', 'Temperatur::view_temperatur'); // Tampilkan semua data
    $routes->get('form_temperatur', 'Temperatur::form_temperatur'); // Form tambah
    $routes->post('save_temperatur', 'Temperatur::save_temperatur'); // Simpan data
    $routes->get('form_update_temperatur/(:num)', 'Temperatur::form_update_temperatur/$1'); // Form edit
    $routes->post('update_temperatur/(:num)', 'Temperatur::update_temperatur/$1'); // Simpan update
    $routes->get('delete_temperatur/(:num)', 'Temperatur::delete_temperatur/$1'); // Hapus data
    $routes->post('upload_excel', 'Temperatur::upload_excel'); // Upload Excel
});

// Udara Routes 
// ROUTES UNTUK TEKANAN UDARA
$routes->get('/tekananudara', 'TekananUdara::view'); // Tampilkan tabel
$routes->get('/tekananudara/form', 'TekananUdara::form'); // Form tambah data
$routes->post('/tekananudara/save', 'TekananUdara::save'); // Simpan data baru

$routes->get('/tekananudara/form_update/(:num)', 'TekananUdara::form_update/$1'); // Form edit
$routes->post('/tekananudara/update/(:num)', 'TekananUdara::update/$1'); // Proses update

$routes->get('/tekananudara/delete/(:num)', 'TekananUdara::delete/$1'); // Hapus data

$routes->post('/tekananudara/upload_excel', 'TekananUdara::upload_excel'); // Upload Excel

// Routes untuk Mahasiswa
$routes->group('mahasiswa', function ($routes) {
    $routes->get('', 'Admin\Mahasiswa::index');
    $routes->get('tambah', 'Admin\Mahasiswa::tambah');
    $routes->post('simpan', 'Admin\Mahasiswa::simpan');
    $routes->get('edit/(:num)', 'Admin\Mahasiswa::edit/$1');
    $routes->post('update/(:num)', 'Admin\Mahasiswa::update/$1');
    $routes->get('hapus/(:num)', 'Admin\Mahasiswa::hapus/$1');
});

$routes->get('hilal/gambar', 'GambarHilalController::index');
$routes->post('hilal/upload_gambar', 'GambarHilalController::upload_gambar');
$routes->post('hilal/update_gambar/(:num)', 'GambarHilalController::update_gambar/$1');
$routes->get('hilal/delete_gambar/(:num)', 'GambarHilalController::delete_gambar/$1');

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
$routes->post('buku-tamu/simpan', 'BukuTamu::simpan');
$routes->get('buku-tamu', 'BukuTamu::form'); // route untuk halaman form buku tamu user



// Routes untuk Pengajuan Surat
$routes->get('pengajuan_surat', 'PengajuanSurat::index');
$routes->get('pengajuan_surat/export_excel', 'PengajuanSurat::export_excel');
$routes->get('pengajuan_surat/ubah_status/(:num)/(:segment)', 'PengajuanSurat::ubah_status/$1/$2');


//routes untuk petir
$routes->get('Petir', 'Petir::view_petir');
$routes->get('Petir/form', 'Petir::form');
$routes->get('Petir/form_update/(:num)', 'Petir::form_update/$1');
$routes->post('Petir/save', 'Petir::save');
$routes->post('Petir/update/(:num)', 'Petir::update/$1');
$routes->get('Petir/delete/(:num)', 'Petir::delete/$1');
$routes->post('Petir/upload', 'Petir::upload');

//Routes untuk Gempa
$routes->get('Gempa', 'Gempa::view_gempa');
$routes->get('Gempa/form_gempa', 'Gempa::form_gempa');
// form_temperatur', 'Temperatur::form_temperatur
$routes->get('Gempa/form_update/(:num)', 'Petir::form_update/$1');
$routes->post('Gempa/save', 'Gempa::save');
$routes->post('Gempa/update/(:num)', 'Gempa::update/$1');
$routes->get('Gempa/delete/(:num)', 'Gempa::delete/$1');
$routes->post('Gempa/upload', 'Gempa::upload');

