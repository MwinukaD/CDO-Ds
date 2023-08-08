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
$routes->get('/account/logout','ClientController::accountLogout');
$routes->get('/account/profile','AccountController::account_profile');
$routes->get('/login/activity','AccountController::loginActivity');
$routes->post('/submit/account/data','ClientController::submitAccountData');
$routes->match(['get', 'post'], 'register','ClientController::account');
$routes->post('/update/profile/data','AccountController::updateProfileData');
$routes->get('/project/afyayangumaishayangu/','AfyaYanguMaishaYangu::index');


//GROUP OF ROUTES THAT NEED AUTHENTICATION TO BE ACCESSED / You must login first to access
$routes->group('home',['filter'=>'auth'],function($routes){
$routes->get('/', 'ClientController::dashboard');  
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
