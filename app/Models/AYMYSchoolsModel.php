<?php

namespace App\Models;

use CodeIgniter\Model;

class AYMYSchoolsModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aymy_schools_reached';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['school_name', 'ward'];


    public function checkSchoolExist($school, $ward)
    {
        return $this->where('school_name', $school)
            ->where('ward', $ward)
            ->first();

    }

    public function removeSchool($id)
    {
        return $this->where('id', $id)->delete();
    }

}