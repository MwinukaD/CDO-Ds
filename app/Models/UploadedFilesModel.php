<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadedFilesModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'uploadedfiles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['type', 'title', 'uploaded_date', 'file', 'project', 'staffID', 'status', 'deleted_date', 'deleted_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];





    public function changeFileStatus($file_id, $date, $deleted_by): bool
    {
        $this->set('status', 'INACTIVE');
        $this->set('deleted_date', $date);
        $this->set('deleted_by', $deleted_by);
        $this->where('id', $file_id);
        $this->update();
        return true; // or false, depending on the success of the update operation
    }


    public function restoreDeletedFile($file_id): bool
    {
        $this->set('status', 'ACTIVE');
        $this->where('id', $file_id);
        $this->update();
        return true; // or false, depending on the success of the update operation
    }



}