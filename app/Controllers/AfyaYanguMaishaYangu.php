<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AYMYWardsModel;
use App\Models\AYMYSchoolsModel;
use App\Models\AYMYStudentsModel;
use App\Models\AYMYYoungWomenModel;
use App\Models\UploadedFilesModel;
use App\Models\AYMYTeachers;


class AfyaYanguMaishaYangu extends BaseController
{


    public function headTeachers()
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); // Model to count number of schools reached
        $AYMYTeachers = new AYMYTeachers(); //Model For Unasihi teachers
        $result['headTeachersWithSchool'] = $AYMYTeachers->select('aymy_teachers.*, aymy_schools_reached.*')
            ->join('aymy_schools_reached', 'aymy_schools_reached.id = aymy_teachers.schoolID')
            ->where('aymy_teachers.title', "Head Teacher")
            ->orderBy('aymy_teachers.id', 'desc')
            ->findAll();

        $result['totalHeadTeachers'] = $AYMYTeachers->where('title', "Head Teacher")->countAllResults(); //totalteacher
        return view('client/head_teachers', $result);


    }




    public function clubSecretaries()
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); // Model to count number of schools reached
        $AYMYStudentsModel = new AYMYStudentsModel(); //Model For Unasihi teachers
        $result['clubSecretaries'] = $AYMYStudentsModel->select('aymy_students_reached.*, aymy_schools_reached.*')
            ->join('aymy_schools_reached', 'aymy_schools_reached.id = aymy_students_reached.schoolID')
            ->where('aymy_students_reached.membership', "Secretary")
            ->orderBy('aymy_schools_reached.id', 'desc')
            ->findAll();

        $result['totalSecretaries'] = $AYMYStudentsModel->where('membership', "Secretary")->countAllResults(); //totalteacher
        return view('client/club_secretaries', $result);

    }



    public function clubChairpersons()
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); // Model to count number of schools reached
        $AYMYStudentsModel = new AYMYStudentsModel(); //Model For Unasihi teachers
        $result['clubChairpersons'] = $AYMYStudentsModel->select('aymy_students_reached.*, aymy_schools_reached.*')
            ->join('aymy_schools_reached', 'aymy_schools_reached.id = aymy_students_reached.schoolID')
            ->where('aymy_students_reached.membership', "Chairperson")
            ->orderBy('aymy_schools_reached.id', 'desc')
            ->findAll();

        $result['totalChairpersons'] = $AYMYStudentsModel->where('membership', "Chairperson")->countAllResults(); //totalteacher
        return view('client/club_chairpersons', $result);

    }





    public function unasihiTeachers()
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); // Model to count number of schools reached
        $AYMYTeachers = new AYMYTeachers(); //Model For Unasihi teachers

        $result['unasihiTeachersWithSchool'] = $AYMYTeachers->select('aymy_teachers.*, aymy_schools_reached.*')
            ->join('aymy_schools_reached', 'aymy_schools_reached.id = aymy_teachers.schoolID')
            ->where('aymy_teachers.title', "Unasihi Teacher")
            ->orderBy('aymy_teachers.id', 'desc')
            ->findAll();

        $result['totalUnasihiTeachers'] = $AYMYTeachers->where('title', "Unasihi Teacher")->countAllResults(); //totalteacher
        return view('client/unasihi_teachers', $result);

    }







    public function removeSchool() //removeSchool
    {
        $schoolID = $this->request->getPost('id');
        $aymyschoolsmodel = new AYMYSchoolsModel(); //Model For Unasihi teachers
        $removed = $aymyschoolsmodel->removeSchool($schoolID);
        if ($removed) {
            $response = [
                "status" => "success",
                "message" => "Successfully removed"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Failed to delete teacher"
            ];
        }
        return $this->response->setJSON($response);
    }




    public function removeTeacher() //removeSchool
    {
        $teacherID = $this->request->getPost('id');
        $AYMYTeachers = new AYMYTeachers();
        $removed = $AYMYTeachers->where('id', $teacherID)->delete();
        if ($removed) {
            $response = [
                "status" => "success",
                "message" => "Successfully removed"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Failed to delete Teacher"
            ];
        }
        return $this->response->setJSON($response);
    }




    public function removeStudent() //removeStudent
    {
        $studentID = $this->request->getPost('id');
        $studentModel = new AYMYStudentsModel();
        $removed = $studentModel->removeStudent($studentID);
        if ($removed) {
            $response = [
                "status" => "success",
                "message" => "Successfully removed"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Failed to delete student"
            ];
        }
        return $this->response->setJSON($response);
    }







    public function reachedSchools()
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); //Model For Unasihi teachers
        $results['schools'] = $aymyschoolsmodel->orderBy('id', 'desc')->findAll();
        $results['count_schools'] = $aymyschoolsmodel->countAllResults();
        return view('client/reached_schools', $results);
    }








    public function addNewSchools()
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); //Model For Unasihi teachers
        $school = $this->request->getVar('school');
        $ward = $this->request->getVar('ward');
        $exist = $aymyschoolsmodel->checkSchoolExist($school, $ward);
        if ($exist) {
            $response = [
                'status' => 'error',
                'message' => 'This school already exist',
            ];
            //return $this->response->setJSON($response);
        } else {

            $inputs = [
                'school_name' => $school,
                'ward' => $ward
            ];
            if ($aymyschoolsmodel->save($inputs)) {
                $response = [
                    'status' => 'success',
                    'message' => 'New school registered'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to register new school',
                ];
                // $response = ['error'=>'Failed to register new teacher'];
            }
        }
        return $this->response->setJSON($response);
    }





    public function addNewTeacher()
    {
        $AYMYTeachers = new AYMYTeachers();
        $fn = $this->request->getVar('firstname');
        $ln = $this->request->getVar('lastname');
        $title = $this->request->getVar('title');
        $sid = $this->request->getVar('school_id');

        $exist = $AYMYTeachers->where('firstname', $fn)->where('lastname', $ln)->where('title', $title)->where('schoolID', $sid)->first();
        if ($exist) {
            $response = [
                'status' => 'error',
                'message' => 'This teacher already exist',
            ];
        } else {

            $inputs = [
                'firstname' => $fn,
                'lastname' => $ln,
                'title' => $title,
                'schoolID' => $sid,
            ];
            if ($AYMYTeachers->save($inputs)) {
                $response = [
                    'status' => 'success',
                    'message' => 'New teacher registered'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to register new teacher',
                ];
            }
        }
        return $this->response->setJSON($response);
    }




    public function addNewStudent()
    {
        //$aymyschoolsmodel = new AYMYSchoolsModel();
        $studentModel = new AYMYStudentsModel();
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $age = $this->request->getVar('age');
        $class = $this->request->getVar('class');
        $liveWith = $this->request->getVar('live_with');
        $jobStatus = $this->request->getVar('parent_job_status');
        $parentJob = $this->request->getVar('parent_job');
        $membership = $this->request->getVar('membership');
        $schoolID = $this->request->getVar('schoolID');

        $exist = $studentModel->checkStudentExist($firstname, $lastname, $age, $class, $liveWith, $jobStatus, $schoolID);
        if ($exist) {
            $response = [
                'status' => 'error',
                'message' => 'This student already exist',
            ];
            //return $this->response->setJSON($response);
        } else {

            $inputs = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'schoolID' => $schoolID,
                'student_age' => $age,
                'student_class' => $class,
                'membership' => $membership,
                'parent_job' => $parentJob,
                'live_with' => $liveWith,
                'parent_jobType' => $jobStatus
            ];

            if ($studentModel->save($inputs)) {
                $response = [
                    'status' => 'success',
                    'message' => 'New student registered'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to register new student',
                ];
                // $response = ['error'=>'Failed to register new teacher'];
            }
        }
        return $this->response->setJSON($response);
    }






    public function clubMemberStudents($id)
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); //Model For Unasihi teachers
        $studentModel = new AYMYStudentsModel();
        $result['schoolID'] = $id;
        $result['schooldata'] = $aymyschoolsmodel->where('id', $id)->findAll();
        $result['students'] = $studentModel->where('schoolID', $id)->orderBy('id', 'desc')->findAll();
        $result['totalstudents'] = $studentModel->where('schoolID', $id)->countAllResults();

        return view('client/student_club_member', $result);

    }


    public function clubMemberTeachers($id)
    {
        $aymyschoolsmodel = new AYMYSchoolsModel(); //Model For Unasihi teachers
        $AYMYTeachers = new AYMYTeachers();
        $result['schoolID'] = $id;
        $result['schooldata'] = $aymyschoolsmodel->where('id', $id)->findAll();
        $result['teachers'] = $AYMYTeachers->where('schoolID', $id)->orderBy('id', 'desc')->findAll();
        $result['totalteachers'] = $AYMYTeachers->where('schoolID', $id)->countAllResults();
        return view('client/teacher_club_member', $result);

    }




    public function uploadedFiles()
    {
        $UploadedFilesModel = new UploadedFilesModel();

        $result['uploadedDocs'] = $UploadedFilesModel->select('uploadedfiles.*, cdo_employees.*')
            ->join('cdo_employees', 'cdo_employees.id = uploadedfiles.staffID')
            ->where('uploadedfiles.project', "AYMY")
            ->orderBy('uploadedfiles.id', 'desc')
            ->findAll();

        $result['totalUploadedDocs'] = $UploadedFilesModel->where('project', 'AYMY')->countAllResults();

        return view("client/aymy_uploaded_files", $result);
    }



    public function uploadNewFile()
    {
        $session = session();
        $uploadedFilesModel = new UploadedFilesModel();
        $session = session();
        $uploader = $session->get('employee_id');
        $title = $this->request->getVar('title');
        $type = $this->request->getVar('type');
        $project = $this->request->getVar('project');
        $uploadedfile = $this->request->getFile('uploaded_file');

        if ($uploadedfile->isValid() && !$uploadedfile->hasMoved()) {
            $filename = $uploadedfile->getRandomName();
            $uploadedfile->move(ROOTPATH . 'public/uploads', $filename);


            $title = $this->request->getVar('fileTitle');
            $project = $this->request->getVar('project');
            $type = $this->request->getVar('type');
            $uploader = $session->has('employee_id');

            //CHECKING IF FILE EXIST
            $exist = $uploadedFilesModel->where('type', $type)->where('title', $title, )->where('project', $project, )->first();
            if (!$exist) {
                $inputs = [
                    'type' => $type,
                    'title' => $title,
                    'file' => $filename,
                    'project' => $project,
                    'staffID' => $uploader
                ];
                //$uploadedFilesModel->fill($inputs);
                $save = $uploadedFilesModel->save($inputs);
                if (!$save) {
                    $response = [
                        'status' => 'error',
                        'message' => 'File uploading failed.'
                    ];
                }
                $response = [
                    'status' => 'success',
                    'message' => 'File uploaded successfully.'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Sorry this file already exist.'
                ];
                //return $this->response->setJSON($response);
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'File uploading failed.'
            ];
        }

        return $this->response->setJSON($response);
    }


}