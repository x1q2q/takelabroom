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

$routes->get('/','GuestController::index');
$routes->get('/home','GuestController::index');
$routes->get('/login','Auth/MemberLoginController::index');
$routes->get('/dologin','Auth/MemberLoginController::doLogin');
$routes->get('/admin/login','Auth/AdminLoginController::index');
$routes->get('/admin/dologin','Auth/AdminLoginController::doLogin');
$routes->get('/register','Auth/RegistrationController::index');
$routes->get('/doregister','Auth/RegistrationController::doRegister');

// member area
$routes->get('/dashboard','Member/DashboardController::index');
// page-html -> will deleted soon
$routes->get('/dashboard/card','Member/DashboardController::card');
$routes->get('/dashboard/form','Member/DashboardController::form');
$routes->get('/dashboard/input','Member/DashboardController::input');
$routes->get('/dashboard/modals','Member/DashboardController::modals');
$routes->get('/dashboard/table','Member/DashboardController::table');
// end page-html

// admin area
$routes->get('/admin','Admin/DashboardController::index');
$routes->get('/admin/dashboard','Admin/DashboardController::index');
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
