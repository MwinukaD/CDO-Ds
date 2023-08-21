<?php

namespace App\Models;

use CodeIgniter\Model;

class AYMYUnasihiTeachers extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aymy_unasihi_teachers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['firstname','lastname','school','status'];

public function fetchUnasihiTeachers(){
    return $this->where('status', "ACTIVE")
            ->orderBy('id','desc')
            ->findAll();

}

 public function checkUnasihiTeacherExist($fn,$ln,$school){
    return $this->where('firstname',$fn)
                      ->where('lastname', $ln)
                      ->where('school',$school)
                      ->first();
 }

 public function removeUnasihiTeacher($id){
    return $this->where('id',$id)->delete();
 }

  


}
