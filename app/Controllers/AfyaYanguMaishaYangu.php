<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AYMYWardsModel;
use App\Models\AYMYSchoolsModel;
use App\Models\AYMYStudentsModel;
use App\Models\AYMYYoungWomenModel;


class AfyaYanguMaishaYangu extends BaseController{
    public function index(){
    $aymywardsmodel = new AYMYWardsModel(); //Model for Project Summary
    $aymyschoolsmodel = new AYMYSchoolsModel(); // Model to count number of schools reached
    $aymystudentmodel = new AYMYStudentsModel(); //Reached Students
    $aymyyoungwomenmodel = new AYMYYoungWomenModel(); //Reached Young Women

    $result['school_reached'] = $aymyschoolsmodel->countAllResults(); 
    $result['wards_reached'] = $aymywardsmodel->countAllResults();
    $result['students_reached'] = $aymystudentmodel->countAllResults();
    $result['youngwomen_reached'] = $aymyyoungwomenmodel->countAllResults();
    return view('client/afyayangumaishayangu',$result);
     
    }
}
