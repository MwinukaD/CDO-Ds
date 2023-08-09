<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\EmployeesModel;
use App\Models\LoginActivityModel;
use App\Models\DashboardModel;

class ClientController extends BaseController{
    #CONSTRUCT FUNCTION, this will be called before any method
    
    public function __construct(){
        $this->session = session();
    }
 

    // public function index(){
    //     return view('client/login');
    // }

    public function account(){
        return view('client/account');
    }

    public function dashboard(){
        $model = new DashboardModel();
        $result['projects']= $model->findAll();
        return view('client/dashboard',$result);
    }

   #******FUNCTION TO SUBMIT NEW ACCOUNT DATA*******
    public function submitAccountData(){
        $employee = $this->request->getVar('employee_no');
        $pass = $this->request->getVar('password');
        $pass_hint = $this->request->getVar('password1');
        if($pass != $pass_hint){
        $response = ['passwordMissMatch'=>'Password fieds does not match'];
        return $this->response->setJSON($response);
        };
        #CHECK IF EMPLOYEE ID EXIST IN CDO DB
        $model = new AccountModel();
        $cdomodel = new EmployeesModel();
        $exist = $cdomodel->where('employee_id_no',$employee)->countAllResults()>0;
        if($exist){

        #CHECK IF ACCOUNT ALREADY EXIST.
        $result=$model->where('employee_id_no',$employee)->countAllResults();
        if($result<=0){  
        $data = [
            'employee_id_no'=>$employee,
            'employee_password'=>md5($pass),
            'employee_password_hint'=>$pass_hint
        ];
        $model->save($data);
        $response = ['success'=>'Account Created Successfully !'];
        return json_encode($response);
    }else{
        $response = ['accountExist'=>'SORRY : This account exist !'];
        return json_encode($response);
    }}else{
        $response = ['idNotExist'=>'This ID-No is not Valid'];
        return $this->response->setJSON($response);
    }
    }

#***************ACCOUNT LOGIN PROCESS *******************

public function index(){
    if ($this->request->getMethod() == 'post')
    {
        $model = new AccountModel();
    $login_activity_model = new LoginActivityModel();
    $employee_id = $this->request->getVar('employee_id');
    $password = md5($this->request->getVar('password'));
    $result = $model->check_user($employee_id, $password);
    if($result){
        
        //Retrive neccessary user infos and save to login activity table
        $login_infos = [
            'uniid'=>$employee_id,
            'agent'=>$this->getUserAgentInfo(),
            'ip_address'=>$this->request->getIPAddress(),
            'login_time	'=>date('Y-m-d h:i:s'),];

        $loginActivityInfo = $login_activity_model->saveLoginInfo($login_infos);
        if($loginActivityInfo){
            $this->session->set('insertID', $loginActivityInfo); #CReating a session to store login id
        }
        $this->session->set('isLoggedIn', TRUE);
        $this->session->set('logged_user', $result['id']);
    $this->session->set('employee_id', $result['employee_id_no']); #CReating a session if user logged in  
     $response = ['success'=>true,];
    }else{
        $response = [
            'success'=>false,
            'message'=>'FAILED..! Wrong Credentials']
        ;
    }
    return $this->response->setJSON($response);

    } 
    else 
    {
        return view('client/login');
    }    
}

#******************FUNCTION TO GET USER AGENT INFO / BROWSER************
public function getUserAgentInfo(){
    $agent = $this->request->getUserAgent();
    if ($agent->isBrowser()) {
        $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
        } elseif ($agent->isRobot()) {
            $currentAgent = $agent->getRobot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    //echo $agent->getPlatform(); // Platform info (Windows, Linux, Mac, etc.)
}


#************ LOGOUT ACCOUNT*********************
public function accountLogout(){
    $login_activity_model = new LoginActivityModel();
    if($this->session->has('insertID')){
        $userID = $this->session->get('insertID');
        $update_logout_time=$login_activity_model->update_account_logout_time($userID);
    }
    $this->session->destroy();
    return redirect()->to(base_url());

}



}






        
        


