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
$routes->get('/', 'Home::index');
$routes->get('/contact', 'Home::contact');
$routes->get('/login', 'Home::login');
$routes->get('/incomeBulanan', 'Home::penjualanBulanan');
$routes->get('/incomeHarian', 'Home::penjualanHarian');
$routes->get('/outcomeBulanan', 'Home::pengeluaranBulanan');
$routes->get('/outcomeHarian', 'Home::pengeluaranHarian');
$routes->get('/dataKaryawan', 'Home::dataKaryawan');
$routes->get('/dataPengguna', 'Home::dataPengguna');
$routes->get('/insertPenjualanHarian', 'Home::tDataJualHarian');
$routes->get('/insertPenjualanBulanan', 'Home::tDataJualBulanan');
$routes->get('/insertPengeluaranHarian', 'Home::tDataKeluarHarian');
$routes->get('/insertPengeluaranBulanan', 'Home::tDataKeluarBulanan');
$routes->get('/insertDataKaryawan', 'Home::tDataKaryawan');
$routes->get('/insertDataPengguna', 'Home::tDataPengguna');
$routes->get('/editPenjualanHarian', 'Home::eDataJualHarian');
$routes->get('/editPenjualanBulanan', 'Home::eDataJualBulanan');
$routes->get('/editPengeluaranHarian', 'Home::eDataKeluarHarian');
$routes->get('/editPengeluaranBulanan', 'Home::eDataKeluarBulanan');
$routes->get('/editDataKaryawan', 'Home::eDataKaryawan');
$routes->get('/editDataPengguna', 'Home::eDataPengguna');


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
