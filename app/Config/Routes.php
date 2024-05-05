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
$routes->setDefaultController('Landing');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ["as" => "auth.page"]);
$routes->post('/', 'Home::do_auth', ["as" => "auth.do_auth"]);
$routes->post('/session.lang', 'Home::do_change_lag', ["as" => "session.lang"]);
$routes->get('/logout', 'Home::do_logout', ["as" => "auth.logout"]);

$routes->group('dashboard', function ($routes) {
    $routes->get("", "Dashboard::index", ["as" => "dashboard.landing"]);

    $routes->get('landing', "Dashboard\Landing::index", ["as" => "dashboard.landing.index"]);

    $routes->get('about-us', "Dashboard\About::index", ["as" => "dashboard.about.index"]);
    $routes->get('about-us/board-and-management', "Dashboard\About::bnm", ["as" => "dashboard.about.bnm"]);
    $routes->get('about-us/corporate-governance', "Dashboard\About::cg", ["as" => "dashboard.about.cg"]);
    $routes->get('about-us/our-code', "Dashboard\About::oc", ["as" => "dashboard.about.oc"]);

    $routes->get('what-we-do', "Dashboard\WhatWeDo::index", ["as" => "dashboard.what-we-do.index"]);
    $routes->get('what-we-do/products', "Dashboard\WhatWeDo::products", ["as" => "dashboard.what-we-do.products"]);
    $routes->get('what-we-do/locations', "Dashboard\WhatWeDo::locations", ["as" => "dashboard.what-we-do.locations"]);

    $routes->get('partnerships', "Dashboard\Partnerships::index", ["as" => "dashboard.partnerships.index"]);

    $routes->get('sustainability', "Dashboard\Sustainability::index", ["as" => "dashboard.sustainability.index"]);
    $routes->get('sustainability/(:segment)', "Dashboard\Sustainability::dynamic/$1", ["as" => "dashboard.sustainability.dynamic"]);

    $routes->get('career', "Dashboard\Career::index", ["as" => "dashboard.career.index"]);

    $routes->get('media', "Dashboard\Media::index", ["as" => "dashboard.media.index"]);
    $routes->get('media/gallery', "Dashboard\Media::gallery", ["as" => "dashboard.media.gallery"]);
    $routes->get('media/press', "Dashboard\Media::press", ["as" => "dashboard.media.press"]);
    $routes->get('media/news', "Dashboard\Media::news", ["as" => "dashboard.media.news"]);

    $routes->get('contact-us', "Dashboard\ContactUs::index", ["as" => "dashboard.contact-us.index"]);
    $routes->get('contact-us/submitted', "Dashboard\ContactUs::post", ["as" => "dashboard.contact-us.post"]);
});

$routes->group("object", function ($routes) {
    $routes->group('strings', function ($routes) {
        $routes->post('get', "Object\Strings::get", ["as" => "object.strings.get"]);
        $routes->post('update/(:segment)', "Object\Strings::update/$1", ["as" => "object.strings.update"]);
    });

    $routes->group('media', function ($routes) {
        $routes->post('upload', "Object\Media::upload", ["as" => "object.media.upload"]);
        $routes->post('dumpUpload', "Object\Media::dumpUpload", ["as" => "object.media.dumpUpload"]);
        $routes->post('get', "Object\Media::get", ["as" => "object.media.get"]);
    });
});


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
