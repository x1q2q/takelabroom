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
$routes->setDefaultController('GuestController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){
    return view('error_page');
});
$routes->setAutoRoute(true);

// auth & others
$routes->get('/','GuestController::index');
$routes->get('/home','GuestController::index');
$routes->get('/login','Auth/MemberLoginController::index');
$routes->get('/dologin','Auth/MemberLoginController::doLogin');
$routes->get('/admin/login','Auth/AdminLoginController::index');
$routes->get('/admin/dologin','Auth/AdminLoginController::doLogin');
$routes->get('/register','Auth/RegistrationController::index');
$routes->get('/doregister','Auth/RegistrationController::doRegister');

// member area
$routes->group('member', static function ($routes) {
    $routes->get('/','Member/DashboardController::index');
    $routes->get('dashboard','Member/DashboardController::index');

    $routes->get('add-reservasi','Member/ReservasiController::addReservasi');
    $routes->get('history-reservasi','Member/ReservasiController::historyReservasi');
    $routes->post('history-reservasi/getdata','Member/ReservasiController::getData');
    $routes->get('profile','Member/ProfileController::index');
});


// admin area
$routes->group('admin', static function ($routes) {
    $routes->get('/','Admin/DashboardController::index');
    $routes->get('dashboard','Admin/DashboardController::index');

    $routes->get('fasilitas','Admin/FacilityController::index');
    $routes->post('fasilitas/getdata','Admin/FacilityController::getData');
    $routes->post('fasilitas/insert','Admin/FacilityController::insertData');
    $routes->get('fasilitas/delete/(:num)','Admin\FacilityController::deleteData/$1');
    $routes->get('fasilitas/detail/(:num)','Admin\FacilityController::detailData/$1');
    $routes->post('fasilitas/update/(:num)','Admin\FacilityController::updateData/$1');

    $routes->get('kategori','Admin/CategoryController::index');
    $routes->post('kategori/getdata','Admin/CategoryController::getData');
    $routes->post('kategori/insert','Admin/CategoryController::insertData');
    $routes->get('kategori/delete/(:num)','Admin\CategoryController::deleteData/$1');
    $routes->get('kategori/detail/(:num)','Admin\CategoryController::detailData/$1');
    $routes->post('kategori/update/(:num)','Admin\CategoryController::updateData/$1');

    $routes->get('labroom','Admin/LabroomController::index');
    $routes->post('labroom/getdata','Admin/LabroomController::getData');
    $routes->post('labroom/insert','Admin/LabroomController::insertData');
    $routes->get('labroom/delete/(:num)','Admin\LabroomController::deleteData/$1');
    $routes->get('labroom/detail/(:num)','Admin\LabroomController::detailData/$1');
    $routes->post('labroom/update/(:num)','Admin\LabroomController::updateData/$1');
    $routes->get('labroom/getlist/(:any)','Admin\LabroomController::getListData/$1');

    $routes->get('daftar-user','Admin/UserController::index');
    $routes->post('daftar-user/getdata','Admin/UserController::getData');
    $routes->get('daftar-user/delete/(:num)','Admin\UserController::deleteData/$1');
    $routes->get('daftar-user/detail/(:num)','Admin\UserController::detailData/$1');

    $routes->get('reservasi','Admin/ReservasiController::index');
    $routes->post('reservasi/getdata','Admin/ReservasiController::getData');
    $routes->get('reservasi/delete/(:num)','Admin\ReservasiController::deleteData/$1');
    $routes->get('reservasi/detail/(:num)','Admin\ReservasiController::detailData/$1');

    $routes->get('reservasi-order','Admin/OrderController::index');
    $routes->post('reservasi-order/getdata','Admin/OrderController::getData');
    $routes->get('reservasi-order/delete/(:num)','Admin\OrderController::deleteData/$1');
    $routes->get('reservasi-order/detail/(:num)','Admin\OrderController::detailData/$1');

    $routes->get('laporan','Admin/LaporanController::index');
    $routes->post('laporan/getdata','Admin/OrderController::getData');
});
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
