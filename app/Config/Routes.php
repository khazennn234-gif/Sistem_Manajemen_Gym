<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Halaman Utama & Dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');

// Modul Member Gym (CRUD Lengkap)
$routes->group('member', static function ($routes) {
    $routes->get('', 'Member::index');
    $routes->get('tambah', 'Member::tambah');
    $routes->post('simpan', 'Member::simpan');
    $routes->get('edit/(:num)', 'Member::edit/$1');
    $routes->post('update/(:num)', 'Member::update/$1');
    $routes->get('hapus/(:num)', 'Member::hapus/$1');
});

// Modul Paket Gym (CRUD Lengkap)
$routes->group('paket', static function ($routes) {
    $routes->get('', 'Paket::index');
    $routes->get('tambah', 'Paket::tambah');
    $routes->post('simpan', 'Paket::simpan');
    $routes->get('edit/(:num)', 'Paket::edit/$1');
    $routes->post('update/(:num)', 'Paket::update/$1');
    $routes->get('hapus/(:num)', 'Paket::hapus/$1');
});

// Modul Instruktur Gym (CRUD Lengkap)
$routes->group('instruktur', static function ($routes) {
    $routes->get('', 'Instruktur::index');
    $routes->get('tambah', 'Instruktur::tambah');
    $routes->post('simpan', 'Instruktur::simpan');
    $routes->get('edit/(:num)', 'Instruktur::edit/$1');
    $routes->post('update/(:num)', 'Instruktur::update/$1');
    $routes->get('hapus/(:num)', 'Instruktur::hapus/$1');
});

// Modul Transaksi Gym (CRUD Lengkap)
$routes->group('transaksi', static function ($routes) {
    $routes->get('', 'Transaksi::index');
    $routes->get('tambah', 'Transaksi::tambah');
    $routes->post('simpan', 'Transaksi::simpan');
    $routes->get('hapus/(:num)', 'Transaksi::hapus/$1');
});

// Modul Otentikasi (Login, Register, Logout)
$routes->group('auth', static function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('proses_login', 'Auth::proses_login');
    $routes->get('register', 'Auth::register');
    $routes->post('proses_register', 'Auth::proses_register');
    $routes->get('logout', 'Auth::logout');
});