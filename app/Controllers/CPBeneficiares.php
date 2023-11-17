<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;


class CPBeneficiares extends ResourceController
{
    protected $modelName = 'App\Models\ChangaraweModel';
    protected $format = 'json';

    public function index()//THIS IS FOR BIBIBABU
    {
        $data['count_bibis'] = $this->model->where('gender','BIBI')->countAllResults();
        $data['count_babus'] = $this->model->where('gender','BABU')->countAllResults();
        $data['bibibabus'] = $this->model->where('sponsorship_type','BIBIBABU')->where('status','ACTIVE')->orderBy('id','DESC')->findAll();
        return view('changarawe/cp_bibibabus',$data);
    }



    public function addNewBibiBabu(){
        $fname  = $this->request->getVar('firstname');
        $lname  = $this->request->getVar('lastname');
        $gender = $this->request->getVar('gender');
        $bDate  = $this->request->getVar('birth_date');

        $BibiBabuExit = $this->model->where('firstname',$fname)
            ->where('lastname',$lname)->where('gender',$gender)->where('birth_date',$bDate)->first();

        if($BibiBabuExit){
            $response = [
                'status'   =>  'error',
                'message'  =>  'This BibiBabu Already Exist..!'
            ];
        }else{
            $passport = $this->request->getFile('passport');
            if ($passport->isValid() && !$passport->hasMoved()) {
                $filename = $passport->getRandomName();

                $passport->move(ROOTPATH . 'public/bibibabu', $filename);
                    $inputs = [
                        'firstname'            => $this->request->getVar('firstname'),
                        'lastname'             => $this->request->getVar('lastname'),
                        'birth_date'           => $this->request->getVar('birth_date'),
                        'health_status'        => $this->request->getVar('health_status'),
                        'disease'              => $this->request->getVar('diseases'),
                        'gender'               => $this->request->getVar('gender'),
                        'live_with'            => $this->request->getVar('live_with'),
                        'income_source'        => $this->request->getVar('income_source'),
                        'sponsorship_type'     => $this->request->getVar('sponsorship_type'),
                        'contact'              => $this->request->getVar('contact'),
                        'passport'             => $filename,

                    ];
                    $save = $this->model->save($inputs);
                    if (!$save) {
                        $response = [
                            'status' => 'error',
                            'message' => 'System filed to save data..'
                        ];
                    }
                    $response = [
                        'status' => 'success',
                        'message' => 'Data are successfully saved.'
                    ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Somethis wrong with passport.'
                ];
            }
        }
        return $this->response->setJSON($response);
    }



    public function removeBibiBabu(){
        $id = $this->request->getVar('id');
        $deletedBy = $this->request->getVar('deleted_by');
        $data = [
            'status' => "INACTIVE",
            'deleted_by' => $deletedBy
        ];
        $removed = $this->model->deleteBibiBabu($id,$data);
        if($removed){
            $response = [
                'status' => 'success',
                'message' => 'Successfully deleted..!'
            ];
        }else{
            $response = [
                'status'  => 'error',
                'message' => 'Failed to delete data..!'
            ];
        }
        return $this->response->setJSON($response);
    }





    public function show($id = null)
    {
        //
    }

    public function new()
    {
        //
    }


    public function create()
    {
        //
    }

    public function edit($id = null)
    {
        //
    }


    public function update($id = null)
    {
        //
    }


    public function delete($id = null)
    {
        //
    }
}
