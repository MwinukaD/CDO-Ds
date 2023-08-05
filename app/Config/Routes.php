<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ClientController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

//THIS ROUTES DON'T NEED AUTH.
// $routes->get('/', 'ClientController::index');
$routes->match(['get', 'post'], '/','ClientController::index');

$routes->get('account/logout','ClientController::accountLogout');

//ALL ROUTES FOR POSTS 
$routes->post('/submit/account/data','ClientController::submitAccountData');
$routes->match(['get', 'post'], 'register','ClientController::account');

//GROUP OF ROUTES THAT NEED AUTHENTICATION TO BE ACCESSED / You must login first to access
$routes->group('home',['filter'=>'auth'],function($routes){
    $routes->get('/', 'ClientController::dashboard');
    $routes->get('/profile','AccountController::account_profile'); //loginActivity
    $routes->get('/login-activity','AccountController::loginActivity');
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
