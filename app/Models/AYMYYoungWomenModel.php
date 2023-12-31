<?php

namespace App\Models;

use CodeIgniter\Model;

class AYMYYoungWomenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aymy_youngwomen_reached';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fullname','age','wardID','job','contacts','testedHIV','result','takingARV','trained','linkedToHSC','status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function updateYWdata($id, $data){
        return $this->update($id,$data);
    }

}
