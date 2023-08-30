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

$routes->match(['get', 'post'], '/', 'ClientController::index');
//$routes->post('/students/club/', 'AfyaYanguMaishaYangu::clubMemberStudents'); ///reached/school/
$routes->get('/students/club/(:segment)', 'AfyaYanguMaishaYangu::clubMemberStudents/$1', ['as' => '/students/club/']); ///reached/school/
$routes->get('/teachers/club/(:segment)', 'AfyaYanguMaishaYangu::clubMemberTeachers/$1', ['as' => '/teachers/club/']); ///reached/school/

$routes->get('/account/logout', 'ClientController::accountLogout');
$routes->get('/account/profile', 'AccountController::account_profile');
$routes->get('/login/activity', 'AccountController::loginActivity');
$routes->post('/submit/account/data', 'ClientController::submitAccountData');
$routes->match(['get', 'post'], 'register', 'ClientController::account');
$routes->post('/update/profile/data', 'AccountController::updateProfileData');
$routes->get('/reached/school/', 'AfyaYanguMaishaYangu::reachedSchools');
$routes->post('/add/school/', 'AfyaYanguMaishaYangu::addNewSchools');
$routes->post('/add/student/', 'AfyaYanguMaishaYangu::addNewStudent');
$routes->post('/add/teacher/', 'AfyaYanguMaishaYangu::addNewTeacher');

$routes->post('/upload/new-file/', 'AfyaYanguMaishaYangu::uploadNewFile');

$routes->get('/aymy/unasihi-teachers/', 'AfyaYanguMaishaYangu::unasihiTeachers');
$routes->get('/aymy/uploaded-files/', 'AfyaYanguMaishaYangu::uploadedFiles');
$routes->get('/trashed/files/', 'AfyaYanguMaishaYangu::trashedFiles');

$routes->get('/aymy/club-chairpersons/', 'AfyaYanguMaishaYangu::clubChairpersons');
$routes->get('/aymy/club-secretaries/', 'AfyaYanguMaishaYangu::clubSecretaries');
$routes->get('/aymy/head-teachers/', 'AfyaYanguMaishaYangu::headTeachers');
$routes->get('home', 'ClientController::dashboard');


$routes->post('/remove/unasihi/teacher/', 'AfyaYanguMaishaYangu::removeUnasihiTeacher'); ///remove/unasihi/teacher/
$routes->post('/remove/school/', 'AfyaYanguMaishaYangu::removeSchool');
$routes->post('/remove/student/', 'AfyaYanguMaishaYangu::removeStudent');
$routes->post('/remove/teacher/', 'AfyaYanguMaishaYangu::removeTeacher');
$routes->post('/remove/file/', 'AfyaYanguMaishaYangu::removeFile');
$routes->post('/restore/file/', 'AfyaYanguMaishaYangu::restoreFile');


//TESTING ROUTES
//$routes->post('/change/file/status/', 'AfyaYanguMaishaYangu::changeFileStatus');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}