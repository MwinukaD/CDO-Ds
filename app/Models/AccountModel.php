<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model{
    protected $table = 'accounts';
    protected $DBGroup = 'default';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['employee_id_no', 'employee_password','employee_password_hint','status'];

    public function check_user($employee_id,$password){
        return $this->where('employee_id_no',$employee_id)->where('employee_password',$password)->first();
    }
    
}
