<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ClientController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();


$routes->match(['get', 'post'], '/', 'ClientController::index');
$routes->post('/submit/account/data', 'ClientController::submitAccountData');
$routes->match(['get', 'post'], 'register', 'ClientController::account');
$routes->post('/update/profile/data', 'AccountController::updateProfileData');
$routes->post('/remove/unasihi/teacher/', 'AfyaYanguMaishaYangu::removeUnasihiTeacher');
$routes->post('/remove/school/', 'AfyaYanguMaishaYangu::removeSchool');
$routes->post('/remove/student/', 'AfyaYanguMaishaYangu::removeStudent');
$routes->post('/remove/teacher/', 'AfyaYanguMaishaYangu::removeTeacher');
$routes->post('/remove/file/', 'AfyaYanguMaishaYangu::removeFile');
$routes->post('/restore/file/', 'AfyaYanguMaishaYangu::restoreFile');
$routes->post('/add-bibibabu/', 'CPBeneficiares::addNewBibiBabu');
$routes->post('/delete/bibibabu/', 'CPBeneficiares::removeBibiBabu');
$routes->post('/add/school/', 'AfyaYanguMaishaYangu::addNewSchools');
$routes->post('/add/student/', 'AfyaYanguMaishaYangu::addNewStudent');
$routes->post('/add/teacher/', 'AfyaYanguMaishaYangu::addNewTeacher');
$routes->post('/upload/new-file/', 'AfyaYanguMaishaYangu::uploadNewFile');
$routes->post('/add-ward/', 'AfyaYanguMaishaYangu::addNewWard');
$routes->post('/remove-ward/', 'AfyaYanguMaishaYangu::removeWard');
$routes->post('/remove-officer/', 'AfyaYanguMaishaYangu::removeWardOfficer');
$routes->post('/submit/WO/data/', 'AfyaYanguMaishaYangu::addNewWardOfficer');
$routes->post('/wo/editing/', 'AfyaYanguMaishaYangu::woDataEditingProcess');
$routes->post('/submit/YW/data/', 'AfyaYanguMaishaYangu::addNewYoungWomen');
$routes->post('/remove-yw/', 'AfyaYanguMaishaYangu::removeYoungWomen');
$routes->post('/yw/editing/', 'AfyaYanguMaishaYangu::editingYoungWomen');
$routes->post('/student/editing/', 'AfyaYanguMaishaYangu::editingStudent');


$routes->get('/reached/school/', 'AfyaYanguMaishaYangu::reachedSchools');
$routes->get('/aymy/unasihi-teachers/', 'AfyaYanguMaishaYangu::unasihiTeachers');
$routes->get('/aymy/uploaded-files/', 'AfyaYanguMaishaYangu::uploadedFiles');
$routes->get('/trashed/files/', 'AfyaYanguMaishaYangu::trashedFiles');
$routes->get('/aymy/club-chairpersons/', 'AfyaYanguMaishaYangu::clubChairpersons');
$routes->get('/aymy/club-secretaries/', 'AfyaYanguMaishaYangu::clubSecretaries');
$routes->get('/aymy/head-teachers/', 'AfyaYanguMaishaYangu::headTeachers');
$routes->get('home', 'ClientController::dashboard');
$routes->get('/project/changarawe/', 'ChangaraweProject::index');
$routes->get('/cp-bibibabu/', 'CPBeneficiares::index');
$routes->get('/cp-schools/', 'CPSchools::index');
$routes->get('/students/club/(:segment)', 'AfyaYanguMaishaYangu::clubMemberStudents/$1', ['as' => '/students/club/']);
$routes->get('/teachers/club/(:segment)', 'AfyaYanguMaishaYangu::clubMemberTeachers/$1', ['as' => '/teachers/club/']);
$routes->get('/account/logout', 'ClientController::accountLogout');
$routes->get('/account/profile', 'AccountController::account_profile');
$routes->get('/login/activity', 'AccountController::loginActivity');
$routes->get('/aymy-analysis/', 'AfyaYanguMaishaYangu::aYMYanalysis');
$routes->get('/ib/aymy-analysis/', 'AfyaYanguMaishaYangu::aYMYIBanalysis');
$routes->get('/reached-wards/', 'AfyaYanguMaishaYangu::reachedWards');
$routes->get('/reached/ward-officers/(:segment)', 'AfyaYanguMaishaYangu::reachedWardOfficers/$1',['as' => '/reached/ward-officers/']);
$routes->get('/edit/ward-officer/(:segment)', 'AfyaYanguMaishaYangu::editWardOfficer/$1',['as'=>'/edit/ward-officer/']);
$routes->get('/reached/yw/(:segment)', 'AfyaYanguMaishaYangu::reachedYoungWomen/$1',['as'=>'/reached/yw/']);
$routes->get('/edit/yw/(:segment)', 'AfyaYanguMaishaYangu::editreachedYoungWomen/$1',['as'=>'/edit/yw/']);
$routes->get('/edit/student/(:segment)', 'AfyaYanguMaishaYangu::editStudentData/$1',['as'=>'/edit/student/']);

//$routes->post('/reached-wos/', 'AfyaYanguMaishaYangu::reachedWOs');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}