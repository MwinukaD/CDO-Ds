<?php include 'layout/topSection.php' ?>
<div class="content-container">
    <div class="container">
        <h4 class="text-center">EDIT STUDENT DATA</h4>
        <?php foreach( $students as $data):?>
            <form action="" method="POST" id="update_wo_data">
                <div class="mb-3">
                    <label for="username" class="form-label">Firstname:</label>
                    <input type="text" class="form-control" id="username" name="firstname" value="<?= old('firstname',$data['firstname'])?> " placeholder="<?php echo $data['firstname']; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Lastname:</label>
                    <input type="text" class="form-control" id="username" name="lastname" value="<?= old('lastname',$data['lastname'])?> " placeholder="<?php echo $data['lastname']; ?>">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Age:</label>
                    <input type="text" class="form-control" id="username" name="student_age" value="<?= old('student_age', $data['student_age'])?>" placeholder="<?php echo $data['student_age']; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Live With:</label>
                    <input type="text" class="form-control" id="username" name="live_with" value="<?= old('live_with', $data['live_with'])?>" placeholder="<?php echo $data['live_with']; ?>">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Parent's/Gardian's job status:</label>
                    <select class="form-select" id="role" name="parent_jobType" required>
                        <option value="<?= old('parent_jobType',$data['parent_jobType']) ?>"><?php echo $data['parent_jobType']?></option>
                        <option value="EMPLOYED">Employed</option>
                        <option value="SELF EMPLOYED">Self Employed</option>
                        <option value="JOBLESS">Jobless</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Parent Job</label>
                    <input type="text" class="form-control" id="username" name="parent_job" value="<?= old('parent_job', $data['parent_job'])?>" placeholder="<?php echo $data['parent_job']; ?>">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Student Class:</label>
                    <select class="form-select" id="role" name="student_class" required>
                        <option value="<?= old('student_class',$data['student_class']) ?>"><?php echo $data['student_class']?></option>
                        <option value="FORM 1">FORM 1</option>
                        <option value="FORM 2">FORM 2</option>
                        <option value="FORM 3">FORM 3</option>
                        <option value="FORM 4">FORM 4</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Membership:</label>
                    <select class="form-select" id="role" name="membership" required>
                        <option value="<?= old('membership',$data['membership']) ?>"><?php echo $data['membership']?></option>
                        <option value="NORMAL">NORMAL</option>
                        <option value="CHAIR PERSON">CHAIR PERSON</option>
                        <option value="SECRETARY">SECRETARY</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Is she been trained?:</label>
                    <select class="form-select" id="role" name="trained" required>
                        <option value="<?= old('trained',$data['trained']) ?>"><?php echo $data['trained']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Does she been Linked to HSCs?:</label>
                    <select class="form-select" id="role" name="linked" required>
                        <option value="<?= old('linked',$data['linked']) ?>"><?php echo $data['linked']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Does she been tested?:</label>
                    <select class="form-select" id="role" name="tested" required>
                        <option value="<?= old('tested',$data['tested']) ?>"><?php echo $data['tested']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label"> Her test result?:</label>
                    <select class="form-select" id="role" name="result" required>
                        <option value="<?= old('result',$data['result']) ?>"><?php echo $data['result']?></option>
                        <option value="POSITIVE">POSITIVE</option>
                        <option value="NEGATIVE">NEGATIVE</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Does she been taking ARV?:</label>
                    <select class="form-select" id="role" name="startedARV" required>
                        <option value="<?= old('startedARV',$data['startedARV']) ?>"><?php echo $data['startedARV']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <input type="hidden" name="sid" value="<?=$data['id']?>">

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables and Buttons JS -->

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
//AJAX CODE FOR  ADDING NEW SCHOOL
include "jsProcess/updateStudentData.php";
?>

</body>

</html>