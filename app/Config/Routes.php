<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('terbit-tenggelam', 'Home::terbit_tenggelam');

// Hilal Routes - PASTIKAN PENULISAN 'hilal' KONSISTEN
$routes->get('Hilal', 'Home::hilal'); // GET /hilal
$routes->post('hilal/simpan', 'Home::simpan_hilal'); 
$routes->post('hilal/update/(:num)', 'Home::update_hilal/$1');
$routes->get('hilal/delete/(:num)', 'Home::delete_hilal/$1');
$routes->get('hilal/gambar/(:num)', 'Home::gambar_hilal/$1');
$routes->post('hilal/upload-gambar', 'Home::upload_gambar_hilal');
$routes->get('hilal/delete-gambar/(:num)', 'Home::delete_gambar_hilal/$1');