<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
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