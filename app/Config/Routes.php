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
    $routes->get('career/create', "Dashboard\Career::create", ["as" => "dashboard.career.create"]);
    $routes->get('career/update/(:segment)', "Dashboard\Career::update/$1", ["as" => "dashboard.career.update"]);

    $routes->get('media', "Dashboard\Media::index", ["as" => "dashboard.media.index"]);
    $routes->get('media/gallery', "Dashboard\Media::gallery", ["as" => "dashboard.media.gallery"]);

    $routes->get('media/press', "Dashboard\Media::press", ["as" => "dashboard.media.press"]);
    $routes->get('media/press/create', "Dashboard\Media::press_create", ["as" => "dashboard.media.press.create"]);
    $routes->get('media/press/update/(:segment)', "Dashboard\Media::press_update/$1", ["as" => "dashboard.media.press.update"]);

    $routes->get('media/news', "Dashboard\Media::news", ["as" => "dashboard.media.news"]);
    $routes->get('media/news/create', "Dashboard\Media::news_create", ["as" => "dashboard.media.news.create"]);
    $routes->get('media/news/update/(:segment)', "Dashboard\Media::news_update/$1", ["as" => "dashboard.media.news.update"]);

    $routes->get('contact-us', "Dashboard\ContactUs::index", ["as" => "dashboard.contact-us.index"]);
    $routes->get('contact-us/submitted', "Dashboard\ContactUs::post", ["as" => "dashboard.contact-us.post"]);

    $routes->get('settings', "Dashboard\Settings::index", ["as" => "dashboard.settings.index"]);
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

    $routes->group('documents', function ($routes) {
        $routes->delete('(:segment)/(:segment)', "Object\Documents::delete/$1/$2", ["as" => "object.documents.delete"]);
        $routes->patch('(:segment)/(:segment)', "Object\Documents::update/$1/$2", ["as" => "object.documents.update"]);
        $routes->post('(:segment)', "Object\Documents::create/$1", ["as" => "object.documents.create"]);
        $routes->get('(:segment)', "Object\Documents::list/$1", ["as" => "object.documents.list"]);
    });

    $routes->group('articles', function ($routes) {
        $routes->post('create/(:segment)', "Object\Articles::create/$1", ["as" => "object.articles.create"]);
        $routes->get('delete/(:segment)', "Object\Articles::delete/$1", ["as" => "object.articles.delete"]);
        $routes->post('update/(:segment)', "Object\Articles::update/$1", ["as" => "object.articles.update"]);
        $routes->get('get/(:segment)', "Object\Articles::get/$1", ["as" => "object.articles.get"]);
        $routes->get('get/detail/(:segment)', "Object\Articles::detail/$1", ["as" => "object.articles.getSpecific"]);
    });

    $routes->group('history', function ($routes) {
        $routes->get('get', "Object\History::list", ["as" => "object.history.list"]);
        $routes->post('', "Object\History::create", ["as" => "object.history.create"]);
        $routes->get('(:segment)', "Object\History::delete/$1", ["as" => "object.history.delete"]);
    });

    $routes->group('career', function ($routes) {
        $routes->post('create', "Object\Careers::create", ["as" => "object.career.create"]);
        $routes->get('delete/(:segment)', "Object\Careers::delete/$1", ["as" => "object.career.delete"]);
        $routes->post('update/(:segment)', "Object\Careers::update/$1", ["as" => "object.career.update"]);
        $routes->get('get', "Object\Careers::get", ["as" => "object.career.get"]);
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
