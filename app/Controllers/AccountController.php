<?php

namespace App\Controllers;

use App\Controllers\BaseController;//EmployeesModel
use App\Models\LoginActivityModel;
use App\Models\EmployeesModel;
use App\Models\AccountModel;

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

    public function updateProfileData(){
        $logged_user_id = $this->session->get('employee_id');
        //echo $this->request->getVar('firstname');
        $EmployeesModel = new EmployeesModel();
        //$employeeData = $EmployeesModel->fetchAccountData(session->get('employee_id'));
        //$accountModel = new AccountModel();
        $data = [
            'firstname'=>$this->request->getVar('firstname'),
            'middlename'=>$this->request->getVar('middlename'),
            'lastname'=>$this->request->getVar('lastname'),
            'phone_no'=>$this->request->getVar('phone'),
            'email'=>$this->request->getVar('email'),
            //'birth'=>$this->request->getVar('birth_date'),
            //'start_date'=>$this->request->getVar('start_date'),
        ];

        $updateProfileData = $EmployeesModel->submitUpdatedEMployeeData($logged_user_id,$data);
        if($updateProfileData){
            $response = ['success'=>'Successfully Updated..!'];
            return $this->response->setJSON($response);

        }else{
            $response = ['error'=>'Updates Failed..!'];
            return $this->response->setJSON($response);
        }

    }




}
