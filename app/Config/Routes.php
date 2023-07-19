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
//$routes->setDefaultController('HomeController');
//$routes->setDefaultMethod('index');
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
$routes->addRedirect('/','login');
$routes->get('login', 'LoginController::index');
$routes->post('login_ajax', 'LoginController::login_ajax');
$routes->group('dashboard',['filter'=>'authFilters'], static function ($routes) {
    $routes->get('/', 'Dashboard\HomeController::index');
    $routes->get('lang/{locale}', 'Dashboard\HomeController::lang');
    $routes->get('logout', 'Dashboard\HomeController::logout');
    $routes->group('user',static function($routes){
        $routes->get('/','Dashboard\UserController::index');
        $routes->get('info','Dashboard\UserController::info');
        $routes->post('create_user','Dashboard\UserController::create_user');
        $routes->post('user_ajax','Dashboard\UserController::user_ajax');
        $routes->post('delete_user','Dashboard\UserController::delete_user');
        $routes->post('update_user','Dashboard\UserController::update_user');
        $routes->post('change_password','Dashboard\UserController::change_password');
    });
    $routes->group('group',static function($routes){
        $routes->get('/','Dashboard\GroupController::index');
        $routes->post('group_ajax','Dashboard\GroupController::group_ajax');
        $routes->post('add_group','Dashboard\GroupController::add_group');
        $routes->post('edit_group','Dashboard\GroupController::edit_group');
        $routes->post('delete_group','Dashboard\GroupController::delete_group');
        $routes->post('tree_group','Dashboard\GroupController::tree_group');
    });
    $routes->group('function',static function($routes){
        $routes->get('/','Dashboard\FunctionController::index');
        $routes->post('function_ajax','Dashboard\FunctionController::function_ajax');
        $routes->post('add_function','Dashboard\FunctionController::add_function');
        $routes->post('edit_function','Dashboard\FunctionController::edit_function');
        $routes->post('delete_function','Dashboard\FunctionController::delete_function');
    });
    $routes->group('type_tree',static function($routes){
        $routes->get('/','Dashboard\TypeTreeController::index');
        $routes->post('tree_ajax','Dashboard\TypeTreeController::tree_ajax');
        $routes->post('add_tree','Dashboard\TypeTreeController::add_tree');
        $routes->post('edit_tree','Dashboard\TypeTreeController::edit_tree');
        $routes->post('delete_tree','Dashboard\TypeTreeController::delete_tree');
    });
    $routes->group('garden',static function($routes){
        $routes->get('/','Dashboard\GardenController::index');
        $routes->post('garden_ajax','Dashboard\GardenController::garden_ajax');
        $routes->post('add_garden','Dashboard\GardenController::add_garden');
        $routes->post('edit_garden','Dashboard\GardenController::edit_garden');
        $routes->post('delete_garden','Dashboard\GardenController::delete_garden');
    });
    $routes->group('treeline',static function($routes){
        $routes->get('/','Dashboard\TreeLineController::index');
        $routes->post('treeline_ajax','Dashboard\TreeLineController::treeline_ajax');
        $routes->post('add_treeline','Dashboard\TreeLineController::add_treeline');
        $routes->post('edit_treeline','Dashboard\TreeLineController::edit_treeline');
        $routes->post('delete_treeline','Dashboard\TreeLineController::delete_treeline');
    });
    $routes->group('userfunction',static function($routes){
        $routes->post('/','Dashboard\UserFunctionController::index');
        $routes->post('update','Dashboard\UserFunctionController::update');
    });
});
//$routes->post('login', 'Login::index');

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
