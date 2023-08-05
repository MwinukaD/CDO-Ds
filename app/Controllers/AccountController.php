<?php

namespace App\Controllers;

use App\Controllers\BaseController;//EmployeesModel
use App\Models\LoginActivityModel;
use App\Models\EmployeesModel;

class AccountController extends BaseController{
    public function __construct(){
        $this->session = session();
    }

    public function account_profile(){
        $EmployeesModel = new EmployeesModel();
        $logged_user_id = $this->session->get('employee_id');
        $fetch['account_data'] = $EmployeesModel->fetchAccountData($logged_user_id);
        return view('client/account_profile',$fetch);
    
    }

    public function loginActivity(){
            //echo $this->session->get('employee_id');
            $login_activity_model = new LoginActivityModel();
            $logged_user_id = $this->session->get('employee_id');
            $fetch['login_activity_data'] = $login_activity_model->fetchLoginActivityData($logged_user_id);
            return view('client/login_activity',$fetch);
    }




}
