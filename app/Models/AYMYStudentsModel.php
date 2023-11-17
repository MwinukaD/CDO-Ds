<?php

namespace App\Models;

use CodeIgniter\Model;

class AYMYStudentsModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aymy_students_reached';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['schoolID', 'firstname', 'lastname', 'student_age', 'live_with', 'parent_jobType', 'parent_job', 'student_class', 'membership','trained','tested','result','linked','startedARV','status'];

    public function checkStudentExist($firstname, $lastname, $age, $class, $liveWith, $jobStatus, $schoolID)
    {
        return $this->where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('student_age', $age)
            ->where('student_class', $class)
            ->where('live_with', $liveWith)
            ->where('parent_jobType', $jobStatus)
            ->where('schoolID', $schoolID)
            ->first();

    }

    public function removeStudent($id)
    {
        return $this->where('id', $id)->delete();

    }





}