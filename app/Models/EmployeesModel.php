<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cdo_employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['employee_id_no','firstname','middlename','lastname','phone_no','email','birth','start_date','status'];

    public function fetchAccountData($id){
        return $this->where('employee_id_no',$id)->findAll();
    }
}
