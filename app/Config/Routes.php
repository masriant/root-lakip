<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/pages', 'Pages::index');
$routes->get('/pages/profile', 'Pages::profile');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');

$routes->get('/materi', 'Materi::index');
$routes->get('/materi/create', 'Materi::create');
// $routes->post('/materi/save', 'Materi::index');
$routes->get('/materi/(:segment)', 'Materi::detail/$1');













// $routes->get('/coba/index', 'Coba::index');
// $routes->get('/coba/about', 'Coba::about');
// $routes->get('/coba/(:any)', 'Coba::about/$1');



// Admin Panel
// $routes->get('/users', 'Admin\Users::index');

// $routes->get('/cek', function () {
//     echo 'Please Contact Me on WhatsApp 085315448868!';
// });

// $routes->get('/coba', 'Coba::index');
// $routes->get('/coba', 'Coba::about');
// $routes->add('/coba', 'Coba::about');

// $routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');
// $routes->get('/coba/(:any)/(:segment)', 'Coba::about/$1');
// $routes->get('/coba/(:any)/(:alpha)', 'Coba::about/$1');
// $routes->get('/coba/(:any)/(:alphanum)', 'Coba::about/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
