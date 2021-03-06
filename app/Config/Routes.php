<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->setTranslateURIDashes(TRUE);
$routes->set404Override(function () {
    $data['siteInfo'] = config('Banana');
    $data['locale'] = 'en-US';
    $data['pageSlug'] = '404';
    $data['pageTitle'] = '404';
    $data['pageDescription'] = 'This page cannot be found.';
    $this->response->setStatusCode(404, 'Page Not Found');
    echo view('_error_404', $data);
});
$routes->setAutoRoute(TRUE);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// ADMIN
$routes->get('admin', 'Admin::dashboard');
$routes->get('admin/(:segment)', 'Admin::$1');
$routes->get('admin/(:segment)/(:segment)', 'Admin::$1/$2');
$routes->get('admin/(:segment)/(:segment)/(:segment)', 'Admin::$1/$2/$3');

// HOME CONTROLLER
$routes->get('/', 'Home::index');
$routes->get('{locale}', 'Home::index');

// LOG IN/OUT AND SIMILAR PAGES/REQUESTS
$routes->get('{locale}/login', 'Home::login');
$routes->post('{locale}/login', 'Home::login_do');
$routes->post('{locale}/logout', 'Home::logout_do');
$routes->post('{locale}/forget_password', 'Home::forget_password_do');
$routes->post('{locale}/register', 'Home::register_do');
$routes->get('{locale}/reset_password', 'Home::reset_password');
$routes->post('{locale}/reset_password', 'Home::reset_password_do');

// GENERIC PAGES
$routes->get('{locale}/(:segment)', 'Home::page/$1');
$routes->get('{locale}/(:segment)/(:segment)', 'Home::page/$1/$2');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
