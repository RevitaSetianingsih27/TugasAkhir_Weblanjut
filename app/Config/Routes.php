<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/contact', 'Home::contact');
$routes->get('/login', 'Home::login');
$routes->get('/', 'Home::admin');
$routes->add('/dologin', 'Home::dologin');
$routes->get('/incomeBulanan', 'Home::penjualanBulanan');
$routes->get('/incomeHarian', 'Home::penjualanHarian');
$routes->get('/outcomeBulanan', 'Home::pengeluaranBulanan');
$routes->get('/outcomeHarian', 'Home::pengeluaranHarian');
$routes->get('/dataKaryawan', 'Home::dataKaryawan');
$routes->get('/dataPengguna', 'Home::dataPengguna');
$routes->get('/insertPenjualanHarian', 'Home::tDataJualHarian');
$routes->get('/insertPenjualanBulanan', 'Home::tDataJualBulanan');
$routes->add('/saveJualB', 'Home::save_JualB');
$routes->add('/saveJualH', 'Home::save_JualH');
$routes->add('/saveKeluarH', 'Home::save_KeluarH');
$routes->add('/saveKeluarB', 'Home::save_KeluarB');
$routes->add('/savePengguna', 'Home::save_pengguna');
$routes->add('/saveKaryawan', 'Home::save_karyawan');
$routes->get('/insertPengeluaranHarian', 'Home::tDataKeluarHarian');
$routes->get('/insertPengeluaranBulanan', 'Home::tDataKeluarBulanan');
$routes->get('/insertDataKaryawan', 'Home::tDataKaryawan');
$routes->get('/insertDataPengguna', 'Home::tDataPengguna');
$routes->add('/editPenjualanHarian/(:num)', 'Home::eDataJualHarian/$1');
$routes->add('/editPenjualanBulanan/(:num)', 'Home::eDataJualBulanan/$1');
$routes->add('/editPengeluaranHarian/(:num)', 'Home::eDataKeluarHarian/$1');
$routes->add('/editPengeluaranBulanan/(:num)', 'Home::eDataKeluarBulanan/$1');
$routes->add('/editDataKaryawan/(:num)', 'Home::eDataKaryawan/$1');
$routes->add('/editDataPengguna/(:num)', 'Home::eDataPengguna/$1');
$routes->add('jual/delete/b/(:num)', 'Home::hapus_jualB/$1');
$routes->add('jual/delete/h/(:num)', 'Home::hapus_jualH/$1');
$routes->add('keluar/delete/b/(:num)', 'Home::hapus_keluarB/$1');
$routes->add('keluar/delete/h/(:num)', 'Home::hapus_keluarH/$1');
$routes->add('pengguna/delete/(:num)', 'Home::hapus_pengguna/$1');
$routes->add('karyawan/delete/(:num)', 'Home::hapus_karyawan/$1');
$routes->add('keluar/update/b', 'Home::update_KeluarB');
$routes->add('keluar/update/h', 'Home::update_KeluarH');
$routes->add('jual/update/h', 'Home::update_JualH');
$routes->add('jual/update/b', 'Home::update_JualB');
$routes->add('pengguna/update', 'Home::update_pengguna');
$routes->add('karyawan/update', 'Home::update_karyawan');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
