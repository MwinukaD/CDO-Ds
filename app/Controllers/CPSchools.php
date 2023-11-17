<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CPSchools extends ResourceController{
    protected $modelName = 'App\Models\CPSchoolsModel';
    protected $format = 'json';

    public function index(){
        $data['countAllCPschools']= $this->model->countAllResults();
        $data['schooldata'] = $this->model->orderBy('id','DESC')->findAll();
        return view('changarawe/cp_schools',$data);
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
