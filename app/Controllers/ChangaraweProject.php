<?php

namespace App\Controllers;

use App\Models\ChangaraweModel;
use CodeIgniter\RESTful\ResourceController;

class ChangaraweProject extends ResourceController
{

    //protected $modelName = 'App\Models\ChangaraweModel';
    //protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index(){
       // $data['cp_beneficiares'] = $this->model->orderBy('id','DESC')->findAll();
        return view('changarawe/changarawe_project');

    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
