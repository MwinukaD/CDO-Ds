<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model{
    protected $table = 'accounts';
    

    public function check_user($employee_id,$password){
        return $this->where('employee_id_no',$employee_id)->where('employee_password',$password)->first();
    }
    
}
