<?php
use CodeIgniter\Router\RouteCollection;
/** @var RouteCollection $routes */
$routes->get('/', 'Auth::index');
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('beranda', 'Beranda::index', ['filter'=>'auth']);
$routes->get('dashboard', 'Dashboard::index', ['filter'=>'auth']);
$routes->resource('kelas', ['controller'=>'Kelas','filter'=>'auth']);
$routes->resource('guru', ['controller'=>'Guru','filter'=>'auth']);
$routes->resource('siswa', ['controller'=>'Siswa','filter'=>'auth']);
$routes->resource('mapel', ['controller'=>'Mapel','filter'=>'auth']);
$routes->resource('jadwal', ['controller'=>'Jadwal','filter'=>'auth']);
$routes->resource('nilai', ['controller'=>'Nilai','filter'=>'auth']);
$routes->get('rekap-nilai', 'RekapNilai::index', ['filter'=>'auth']);
$routes->get('laporan', 'Laporan::index', ['filter'=>'auth']);