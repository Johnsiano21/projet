<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('showClient');
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
$routes->get('/exemple', 'Home::index');
$routes->post('/saveUser', 'Home::saveUser');
$routes->get('/getSingleUser/(:num)', 'Home::getSingleUser/$1');
$routes->post('/updateUser', 'Home::updateUser');
$routes->post('/deleteUser', 'Home::deleteUser');

//CLIENT
$routes->get('/', 'Home::showClient');
$routes->post('/saveClient','Home::saveClient');
$routes->get('/getSingleClient/(:num)','Home::getSingleClient/$1');
$routes->post('/updateClient', 'Home::updateClient');
$routes->post('/deleteClient', 'Home::deleteClient');

//LOGEMENT
$routes->get('/logement', 'Home::showLogement');
$routes->post('/logement/saveLogement','Home::saveLogement');
$routes->get('logement/getSingleLogement/(:num)','Home::getSingleLogement/$1');
$routes->post('/logement/updateLogement','Home::updateLogement');

//FACTURE
$routes->get('/facture', 'Home::showFacture');


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
