<?php

namespace App\Models;

use CodeIgniter\Model;

class AymyWOreached extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aymy_wo_reached';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['wo_firstname','wo_title','wo_lastname','wardID','wo_age','wo_contacts','trained','status'];

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

  public function updateWOdata($id,$data){
      //$this->where('id', $id);
      return $this->update($id, $data);

  }
}
