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
$routes->set404Override(function () {
    return view('error_page');
});
$routes->setAutoRoute(true);

// auth & others
$routes->get('/', 'GuestController::index');
$routes->get('/home', 'GuestController::index');
$routes->get('/labroom', 'GuestController::labroom');
$routes->get('/contact', 'GuestController::contact');
$routes->get('/login', 'Auth/MemberLoginController::index');
$routes->get('/dologin', 'Auth/MemberLoginController::doLogin');
$routes->get('/admin/login', 'Auth/AdminLoginController::index');
$routes->get('/admin/dologin', 'Auth/AdminLoginController::doLogin');
$routes->get('/register', 'Auth/RegistrationController::index');
$routes->get('/doregister', 'Auth/RegistrationController::doRegister');

// member area
$routes->group('member', static function ($routes) {
    $routes->get('/','Member/DashboardController::index');
    $routes->get('dashboard','Member/DashboardController::index');

    $routes->get('add-reservation','Member/ReservasiController::addReservation');
    $routes->get('add-reservation/(:segment)','Member\ReservasiController::checkLab/$1');
    $routes->get('my-reservation','Member/ReservasiController::myReservation');
    $routes->post('my-reservation/getdata/(:any)/(:num)','Member\ReservasiController::getData/$1/$2');
    $routes->post('my-reservation/insert','Member/ReservasiController::insertData');
    $routes->post('my-reservations/change-status', 'Member\ReservasiController::changeStatus');
    $routes->post('my-reservations/upload-bukti', 'Admin\OrderController::uploadBukti');

    $routes->get('my-profile','Member/ProfileController::index');
});


// admin area
$routes->group('admin', static function ($routes) {
    $routes->get('/', 'Admin/DashboardController::index');
    $routes->get('infographics', 'Admin/DashboardController::index');

    $routes->get('list-facilities', 'Admin/FacilityController::index');
    $routes->post('list-facilities/getdata', 'Admin/FacilityController::getData');
    $routes->post('list-facilities/insert', 'Admin/FacilityController::insertData');
    $routes->get('list-facilities/delete/(:num)', 'Admin\FacilityController::deleteData/$1');
    $routes->get('list-facilities/detail/(:num)', 'Admin\FacilityController::detailData/$1');
    $routes->post('list-facilities/update/(:num)', 'Admin\FacilityController::updateData/$1');

    $routes->get('lab-category', 'Admin/CategoryController::index');
    $routes->post('lab-category/getdata', 'Admin/CategoryController::getData');
    $routes->post('lab-category/insert', 'Admin/CategoryController::insertData');
    $routes->get('lab-category/delete/(:num)', 'Admin\CategoryController::deleteData/$1');
    $routes->get('lab-category/detail/(:num)', 'Admin\CategoryController::detailData/$1');
    $routes->post('lab-category/update/(:num)', 'Admin\CategoryController::updateData/$1');

    $routes->get('list-labrooms', 'Admin/LabroomController::index');
    $routes->post('list-labrooms/getdata', 'Admin/LabroomController::getData');
    $routes->post('list-labrooms/insert', 'Admin/LabroomController::insertData');
    $routes->get('list-labrooms/delete/(:num)', 'Admin\LabroomController::deleteData/$1');
    $routes->get('list-labrooms/detail/(:num)', 'Admin\LabroomController::detailData/$1');
    $routes->post('list-labrooms/update/(:num)', 'Admin\LabroomController::updateData/$1');
    $routes->get('list-labrooms/getlist/(:any)', 'Admin\LabroomController::getListData/$1');

    $routes->get('list-members', 'Admin/UserController::index');
    $routes->post('list-members/getdata', 'Admin/UserController::getData');
    $routes->get('list-members/delete/(:num)', 'Admin\UserController::deleteData/$1');
    $routes->get('list-members/detail/(:num)', 'Admin\UserController::detailData/$1');

    $routes->get('all-reservations', 'Admin/ReservasiController::index');
    $routes->post('all-reservations/getdata', 'Admin/ReservasiController::getData');
    $routes->get('all-reservations/delete/(:num)', 'Admin\ReservasiController::deleteData/$1');
    $routes->get('all-reservations/detail/(:num)', 'Admin\ReservasiController::detailData/$1');
    $routes->post('all-reservations/change-status', 'Admin\ReservasiController::changeStatus');

    $routes->get('paid-reservations','Admin/OrderController::index');
    $routes->post('paid-reservations/getdata','Admin/OrderController::getData');
    $routes->get('paid-reservations/delete/(:num)','Admin\OrderController::deleteData/$1');
    $routes->get('paid-reservations/detail/(:num)','Admin\OrderController::detailData/$1');
    $routes->post('paid-reservations/change-status', 'Admin\OrderController::changeStatus');

    $routes->get('schedule-reservation','Admin/ReservasiController::scheduleReserv');

    $routes->get('report-reservation','Admin/LaporanController::index');
    $routes->post('report-reservation/getdata','Admin/OrderController::getData');
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
