<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AYMYSchoolsModel;
use App\Models\AYMYStudentsModel;
use App\Models\UploadedFilesModel;
use App\Models\AYMYTeachers;
use App\Models\AYMYWardsModel;
use App\Models\AymyWOreached;
use App\Models\AYMYYoungWomenModel;


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


    public function removeSchool()
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
        $phone = $this->request->getVar('phone');
        $sid = $this->request->getVar('school_id');

        $exist = $AYMYTeachers->where('firstname', $fn)->where('lastname', $ln)->where('title', $title)->where('schoolID', $sid)->where('status', 'ACTIVE')->first();
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
                'phoneNo' => $phone,
                'trained'=> $title = $this->request->getVar('trained'),
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
                'parent_jobType' => $jobStatus,
                'trained' => $this->request->getVar('trained'),
                'tested' => $this->request->getVar('tested'),
                'linked' => $this->request->getVar('linked'),
                'startedARV' => $this->request->getVar('taking'),
                'result' => $this->request->getVar('result'),

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
        $result['totalTrashedFiles'] = $UploadedFilesModel->where('project', 'AYMY')->where('status', 'INACTIVE')->countAllResults();

        $result['uploadedDocs'] = $UploadedFilesModel->select('uploadedfiles.*, cdo_employees.firstname,cdo_employees.lastname,cdo_employees.employee_id_no,')
            ->join('cdo_employees', 'cdo_employees.employee_id_no = uploadedfiles.staffID')
            ->where('uploadedfiles.project', "AYMY")->where('uploadedfiles.status', "ACTIVE")
            ->orderBy('uploadedfiles.id', 'desc')
            ->findAll();

        $result['totalUploadedDocs'] = $UploadedFilesModel->where('project', 'AYMY')->where('status', "ACTIVE")->countAllResults();

        return view("client/aymy_uploaded_files", $result);
    }


    public function uploadNewFile()
    {
        $session = session();
        $uploadedFilesModel = new UploadedFilesModel();
        $uploader = $session->get('employee_id');
        $title = $this->request->getVar('title');
        $type = $this->request->getVar('type');
        $project = $this->request->getVar('project');
        $uploadedfile = $this->request->getFile('uploaded_file');

        if ($uploadedfile->isValid() && !$uploadedfile->hasMoved()) {
            $filename = $uploadedfile->getRandomName();

            $title = $this->request->getVar('fileTitle');
            $project = $this->request->getVar('project');
            $type = $this->request->getVar('type');
            $uploader = $session->get('employee_id');

            //CHECKING IF FILE EXIST
            $exist = $uploadedFilesModel->where('type', $type)->where('title', $title)->where('project', $project)->where('status', "ACTIVE")->first();
            if (!$exist) {
                $uploadedfile->move(ROOTPATH . 'public/uploads', $filename);
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

    public function removeFile()
    {
        $fileID = $this->request->getPost('id');
        $deleted_by = $this->request->getPost('deleted_by');
        $date_deleted = date('Y-m-d h:i:s');
        $uploadedFilesModel = new UploadedFilesModel(); // Model for UploadedFiles
        $removed_doc = $uploadedFilesModel->changeFileStatus($fileID, $date_deleted, $deleted_by);
        if ($removed_doc) {
            $response = ["status" => "success", "message" => "File successfully deleted"];
        } else {
            $response = ["status" => "error", "message" => "Failed to delete the file"];
        }
        return $this->response->setJSON($response);
    }

    public function restoreFile()
    {
        $fileID = $this->request->getPost('id');
        $uploadedFilesModel = new UploadedFilesModel(); // Model for UploadedFiles
        $file_restored = $uploadedFilesModel->restoreDeletedFile($fileID);
        if ($file_restored) {
            $response = ["status" => "success", "message" => "File successfully restored"];
        } else {
            $response = ["status" => "error", "message" => "Failed to restore this file"];
        }
        return $this->response->setJSON($response);
    }
    public function trashedFiles()
    {
        $UploadedFilesModel = new UploadedFilesModel();
        $result['totalTrashedFiles'] = $UploadedFilesModel->where('project', 'AYMY')->where('status', 'INACTIVE')->countAllResults();
        $result['uploadedDocs'] = $UploadedFilesModel->select('uploadedfiles.*, cdo_employees.firstname,cdo_employees.lastname')
            ->join('cdo_employees', 'cdo_employees.employee_id_no = uploadedfiles.staffID')
            ->where('uploadedfiles.project', "AYMY")->where('uploadedfiles.status', "INACTIVE")
            ->orderBy('uploadedfiles.deleted_date', 'desc')
            ->findAll();

        $result['totalUploadedDocs'] = $UploadedFilesModel->where('project', 'AYMY')->countAllResults();

        return view("client/trashed_files", $result);
    }


    public function aYMYanalysis()
    {
        $studentmodel = new AYMYStudentsModel();
        $ywDB = new AYMYYoungWomenModel();

        $results['numberOfAdolescent'] = $studentmodel->where('status', 'ACTIVE')->countAllResults();
        $results['adolescentTrained'] = $studentmodel->where('status', 'ACTIVE')->where('trained','YES')->countAllResults();
        $results['adolescentTested'] = $studentmodel->where('status', 'ACTIVE')->where('tested','YES')->countAllResults();
        $results['adolescentTestedNegative'] = $studentmodel->where('status', 'ACTIVE')->where('tested','YES')->where('result','NEGATIVE')->countAllResults();
        $results['adolescentTestedPositive'] = $studentmodel->where('status', 'ACTIVE')->where('tested','YES')->where('result','POSITIVE')->countAllResults();
        $results['adolescentLinked'] = $studentmodel->where('status', 'ACTIVE')->where('linked','YES')->countAllResults();
        $results['adolescentStartedARV'] = $studentmodel->where('status', 'ACTIVE')->where('startedARV','YES')->countAllResults();
        $results['employedParents'] = $studentmodel->where('status', 'ACTIVE')->where('parent_jobType','EMPLOYED')->countAllResults();
        $results['unemployedParents'] = $studentmodel->where('status', 'ACTIVE')->where('parent_jobType','SELF EMPLOYED')->countAllResults();
        $results['joblessParents'] = $studentmodel->where('status', 'ACTIVE')->where('parent_jobType','JOBLESS')->countAllResults();
        $results['targetAdolescent'] = 10841;


        $results['numberOfYoungWomen'] = $ywDB->where('status', 'ACTIVE')->countAllResults();
        $results['targetYoungWomen'] = 10841;

        $results['ywTrained'] = $ywDB->where('status', 'ACTIVE')->where('trained','YES')->countAllResults();
        $results['ywTested'] = $ywDB->where('status', 'ACTIVE')->where('testedHIV','YES')->countAllResults();
        $results['ywTestedNegative'] = $ywDB->where('status', 'ACTIVE')->where('testedHIV','YES')->where('result','NEGATIVE')->countAllResults();
        $results['ywTestedPositive'] = $ywDB->where('status', 'ACTIVE')->where('testedHIV','YES')->where('result','POSITIVE')->countAllResults();
        $results['ywLinked'] = $ywDB->where('status', 'ACTIVE')->where('linkedToHSC','YES')->countAllResults();
        $results['ywStartedARV'] = $ywDB->where('status', 'ACTIVE')->where('takingARV','YES')->countAllResults();
        $results['employedYW'] = $ywDB->where('status', 'ACTIVE')->where('job','EMPLOYED')->countAllResults();
        $results['unemployedYW'] = $ywDB->where('status', 'ACTIVE')->where('job','SELF EMPLOYED')->countAllResults();
        $results['joblessYW'] = $ywDB->where('status', 'ACTIVE')->where('job','JOBLESS')->countAllResults();


        return view('client/aymy_analysis_page', $results);
    }

    public function reachedWards()
    {
        $wardDB = new AYMYWardsModel();
        $result['reached_wards'] = $wardDB->where('status','ACTIVE')->countAllResults();
        $result['wards'] = $wardDB->where('status','ACTIVE')->orderBy('id','DESC')->findAll();
        return view('client/reached_wards', $result);
    }

    public function addNewWard()
    {
        $wardDB = new AYMYWardsModel();
        $ward = $this->request->getVar('ward');
        $input = [
            'ward_name' => $ward
        ];
        $exist = $wardDB->where('ward_name', $ward)->first();
        if (!$exist) {
            $wardDB->save($input);
            $response = [
                'status' => 'success',
                'message' => 'Ward is successfully inserted '
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'This ward already exist'
            ];
        }
        return $this->response->setJSON($response);
    }

    public function removeWard(){
        $wardDB = new AYMYWardsModel();
        $wardID = $this->request->getPost('id');
        $updateStatus = $wardDB->where('id',$wardID)->set('status','INACTIVE')->update();
        if($updateStatus){
            $response = [
                'status' => 'success',
                'message' => 'Ward is successfully removed '
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Failed to remove this ward'
            ];
        }
        return $this->response->setJSON($response);
    }

public function reachedWOs(){
        $woDB = new AymyWOreached();
        $wardID = $this->request->getPost('id');
        $result['totalWO'] = $woDB->where('wardID',$wardID)->countAllResults();
        $result['wardOfficer'] = $woDB->where('wardID',$wardID)->findAll();
        return view('client/wo_reached',$result);
}
 public function removeWardOfficer(){
        $officersDB = new AymyWOreached();
        $officerID = $this->request->getPost('id');
        $updateStatus = $officersDB->where('id',$officerID)->set('status','INACTIVE')->update();
        if($updateStatus){
            $response = [
                'status' => 'success',
                'message' => 'Officer is successfully removed '
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Failed to remove this Officer'
            ];
        }
        return $this->response->setJSON($response);
    }


public function reachedWardOfficers($id){
        $wardOfficerDB = new AymyWOreached();
        $results['ward_ID'] = $id;
        $results['totalWEOs'] = $wardOfficerDB->where('wardID',$id)->where('wo_title','WARD EDUCATION OFFICER')->countAllResults();
        $results['totalNurses'] = $wardOfficerDB->where('wardID',$id)->where('wo_title','NURSE')->countAllResults();
        $results['totalCHWs'] = $wardOfficerDB->where('wardID',$id)->where('wo_title','COMMUNITY HEALTH WORKERS')->countAllResults();
        $results['wardOfficers'] = $wardOfficerDB->where('wardID',$id)->where('status','ACTIVE')->orderBy('id','desc')->findAll();
        return view('client/wo_reached',$results);

}

public function addNewWardOfficer(){
        $WOreachedDB  = new AymyWOreached();
        $firstname    = $this->request->getVar('firstname');
        $lastname     = $this->request->getVar('lastname');
        $title        = $this->request->getVar('title');
        $ward         = $this->request->getVar('ward_id');

        $data = [
            'wo_firstname' => $firstname,
            'wo_lastname'  => $lastname,
            'wo_title'     => $title,
            'wardID'       => $ward,
            'wo_age'       => $this->request->getVar('age'),
            'wo_contacts'  => $this->request->getVar('phone'),
            'trained'      => $this->request->getVar('trained'),
            'status'       => "ACTIVE",
        ];
        $isExisted = $WOreachedDB->where('wo_firstname',$firstname)->where('wo_lastname',$lastname)->where('wo_title',$title)->where('wardID',$ward)->first();
        if($isExisted){
            $response = [
                'status'  => 'error',
                'message' => 'This Officer already exist..!'
            ];
        }else {
            if ($WOreachedDB->save($data)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Successifully added..!'
                ];
            }else{
                $response = [
                    'status'  => 'error',
                    'message' => 'Failed to insert data..!'
                ];
            }
        }
        return $this->response->setJSON($response);
}

public function editWardOfficer($id){
    $officerDB  = new AymyWOreached();
    $result['details'] = $officerDB->where('id',$id)->findALl();
    return view('client/edit_ward_officer_details',$result);
}

public function woDataEditingProcess(){

        $officeID = $this->request->getVar('oid');

        $updated_inputs = [
            'wo_firstname' => $this->request->getVar('fname'),
            'wo_title' => $this->request->getVar('title'),
            'wo_lastname' => $this->request->getVar('lname'),
            'wo_age' => $this->request->getVar('age'),
            'wo_contacts' => $this->request->getVar('contact'),
            'trained' => $this->request->getVar('trained'),

        ];
        $officerDB  = new AymyWOreached();
        $updated = $officerDB->updateWOdata($officeID,$updated_inputs);
        if($updated){
            $response = [
                'status' => 'success',
                'message' => 'Successifully'
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Something went wrong'
            ];
        }
        return $this->response->setJSON($response);
}

    public function reachedYoungWomen($id){
        $ywmodel = new AYMYYoungWomenModel();
        $results['wardID'] = $id;
        $results['yw'] = $ywmodel->where('wardID',$id)->where('status', 'ACTIVE')->orderBy('id', 'desc')->findAll();
        $results['totalYW'] = $ywmodel->where('wardID',$id)->where('status', 'ACTIVE')->countAllResults();
        $results['totalTested'] = $ywmodel->where('wardID',$id)->where('status', 'ACTIVE')->where('testedHIV', 'YES')->countAllResults();
        $results['totalTakingARVs'] = $ywmodel->where('wardID',$id)->where('status', 'ACTIVE')->where('takingARV', 'YES')->countAllResults();
        $results['totalLinkedToHSC'] = $ywmodel->where('wardID',$id)->where('status', 'ACTIVE')->where('linkedToHSC', 'YES')->countAllResults();
        $results['totalTrained'] = $ywmodel->where('wardID',$id)->where('status', 'ACTIVE')->where('trained', 'YES')->countAllResults();
        return view('client/reached_young_women',$results);
    }

    public function addNewYoungWomen(){
        $ywmodel = new AYMYYoungWomenModel();
        $fullname    = $this->request->getVar('fullname');
        $age     = $this->request->getVar('age');
        $job        = $this->request->getVar('job');
        $wardID         = $this->request->getVar('wardID');

        $isExisted = $ywmodel->where('fullname',$fullname)
            ->where('age',$age)->where('job',$job)
            ->where('wardID',$wardID)->first();
        if($isExisted){
            $response = [
                'status'  => 'error',
                'message' => 'Data Exist..!'
            ];
        }else {
            $data = [
                'fullname' => $fullname,
                'age'  => $age,
                'job'     => $job,
                'wardID'       => $wardID,
                'contacts'  => $this->request->getVar('phone'),
                'trained'       => $this->request->getVar('trained'),
                'linkedToHSC'      => $this->request->getVar('linked'),
                'testedHIV'      => $this->request->getVar('tested'),
                'takingARV'      => $this->request->getVar('taking'),
                'result'      => $this->request->getVar('result'),
            ];
            if ($ywmodel->save($data)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Successifully added..!'
                ];
            }else{
                $response = [
                    'status'  => 'error',
                    'message' => 'Failed to insert data..!'
                ];
            }
        }
        return $this->response->setJSON($response);
    }

    public function removeYoungWomen(){
        $ywID = $this->request->getPost('id');
        $ywDB = new AYMYYoungWomenModel();
        $updateStatus = $ywDB->where('id',$ywID)->set('status','INACTIVE')->update();
        if($updateStatus){
            $response = [
                'status' => 'success',
                'message' => 'Officer is successfully removed '
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Failed to remove this Officer'
            ];
        }
        return $this->response->setJSON($response);


    }

    public function editreachedYoungWomen($id){
        $ywDB = new AYMYYoungWomenModel();
        $results['yw'] = $ywDB->where('id',$id)->findAll();
        return view('client/edit_young_women',$results);
    }

public function editingYoungWomen(){

    $ywID = $this->request->getVar('oid');

    $updated_inputs = [
        'fullname' => $this->request->getVar('fullname'),
        'age' => $this->request->getVar('age'),
        'contacts' => $this->request->getVar('contacts'),
        'job' => $this->request->getVar('job'),
        'trained' => $this->request->getVar('trained'),
        'linkedToHSC' => $this->request->getVar('linked'),
        'testedHIV' => $this->request->getVar('tested'),
        'takingARV' => $this->request->getVar('taking'),
        'result' => $this->request->getVar('result'),
    ];
    $ywDB = new AYMYYoungWomenModel();
    $updated = $ywDB->updateYWdata($ywID,$updated_inputs);
    if($updated){
        $response = [
            'status' => 'success',
            'message' => 'Successifully'
        ];
    }else{
        $response = [
            'status' => 'error',
            'message' => 'Something went wrong'
        ];
    }
    return $this->response->setJSON($response);

}

public function editStudentData($id){
    //$aymyschoolsmodel = new AYMYSchoolsModel();
    $studentModel = new AYMYStudentsModel();
    $studentID = $id;
    $result['students'] = $studentModel->where('id', $id)->findAll();
    return view('client/edit_student_details', $result);

}

public function editingStudent(){
    $studentID = $this->request->getVar('sid');

    $updated_inputs = [
        'firstname' => $this->request->getVar('firstname'),
        'lastname' => $this->request->getVar('lastname'),
        'student_age' => $this->request->getVar('student_age'),
        'live_with' => $this->request->getVar('live_with'),
        'parent_jobType' => $this->request->getVar('parent_jobType'),
        'parent_job' => $this->request->getVar('parent_job'),
        'student_class' => $this->request->getVar('student_class'),
        'membership' => $this->request->getVar('membership'),
        'trained' => $this->request->getVar('trained'),
        'linked' => $this->request->getVar('linked'),
        'tested' => $this->request->getVar('tested'),
        'result' => $this->request->getVar('result'),
        'startedARV' => $this->request->getVar('startedARV'),
    ];
    $studentModel = new AYMYStudentsModel();
    $updated = $studentModel->update($studentID,$updated_inputs);
    if($updated){
        $response = [
            'status' => 'success',
            'message' => 'Successifully'
        ];
    }else{
        $response = [
            'status' => 'error',
            'message' => 'Something went wrong'
        ];
    }
    return $this->response->setJSON($response);

}

public function aYMYIBanalysis(){
        $woDB = new AymyWOreached();
        $teachersDB = new AYMYTeachers();
        $result['reachedNurses'] = $woDB->where('wo_title','NURSE')->where('status','ACTIVE')->countAllResults();
        $result['trainedNurses'] = $woDB->where('wo_title','NURSE')->where('trained','YES')->where('status','ACTIVE')->countAllResults();

        $result['reachedWEO'] = $woDB->where('wo_title','WARD EDUCATION OFFICER')->where('status','ACTIVE')->countAllResults();
        $result['trainedWEO'] = $woDB->where('wo_title','WARD EDUCATION OFFICER')->where('trained','YES')->where('status','ACTIVE')->countAllResults();

        $result['reachedCHW'] = $woDB->where('wo_title','COMMUNITY HEALTH WORKER')->where('status','ACTIVE')->countAllResults();
        $result['trainedCHW'] = $woDB->where('wo_title','COMMUNITY HEALTH WORKER')->where('trained','YES')->where('status','ACTIVE')->countAllResults();

        $result['reachedHTeachers'] = $teachersDB->where('title','Head Teacher')->where('status','ACTIVE')->countAllResults();
        $result['trainedHTeachers'] = $teachersDB->where('title','Head Teacher')->where('trained','YES')->where('status','ACTIVE')->countAllResults();

        $result['reachedUTeachers'] = $teachersDB->where('title','Unasihi Teacher')->where('status','ACTIVE')->countAllResults();
        $result['trainedUTeachers'] = $teachersDB->where('title','Unasihi Teacher')->where('trained','YES')->where('status','ACTIVE')->countAllResults();


    return view('client/aymy_ib_analysis',$result);

}


}