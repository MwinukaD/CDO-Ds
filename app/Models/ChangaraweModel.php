<?php

namespace App\Models;

use CodeIgniter\Model;

class ChangaraweModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cp_beneficiaries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['passport','income_source','birth_date','firstname','lastname','sponsorship_type','gender','health_status','disease','live_with','contact','school','class_level','feeding_program','status','deleted_by','deleted_date','class'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function deleteBibiBabu($id,$data){
        $this->where('id',$id);
        $this->set($data);
        $this->update();
        return true;


}





}
