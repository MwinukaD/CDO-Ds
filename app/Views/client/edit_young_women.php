<?php include 'layout/topSection.php' ?>
<div class="content-container">
    <div class="container">
        <h4 class="text-center">EDIT YOUNG WOMEN DATA</h4>
        <?php foreach( $yw as $data):?>
            <form action="" method="POST" id="update_wo_data">
                <div class="mb-3">
                    <label for="username" class="form-label">Fullname:</label>
                    <input type="text" class="form-control" id="username" name="fullname" value="<?= old('fullname',$data['fullname'])?> " placeholder="<?php echo $data['fullname']; ?>">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Age:</label>
                    <input type="text" class="form-control" id="username" name="age" value="<?= old('age', $data['age'])?>" placeholder="<?php echo $data['age']; ?>">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Phone No:</label>
                    <input type="text" class="form-control" id="username" name="contacts" value="<?= old('contacts', $data['contacts'])?>" placeholder="<?php echo $data['contacts']; ?>">
                </div>



                <input type="hidden" class="form-control" id="username" name="oid" value="<?php echo $data['id']; ?>">



                <div class="mb-3">
                    <label for="role" class="form-label">Her job status:</label>
                    <select class="form-select" id="role" name="job" required>
                        <option value="<?= old('job',$data['job']) ?>"><?php echo $data['job']?></option>
                        <option value="EMPLOYED">EMPLOYED</option>
                        <option value="SELF EMPLOYED">SELF EMPLOYED</option>
                        <option value="JOBLESS">JOBLESS</option>
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
                    <label for="role" class="form-label">Does she been tested?:</label>
                    <select class="form-select" id="role" name="tested" required>
                        <option value="<?= old('tested',$data['testedHIV']) ?>"><?php echo $data['testedHIV']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Her test result?:</label>
                    <select class="form-select" id="role" name="result" required>
                        <option value="<?= old('result',$data['result']) ?>"><?php echo $data['result']?></option>
                        <option value="POSITIVE">POSITIVE</option>
                        <option value="NEGATIVE">NEGATIVE</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Does she been Linked to HSCs?:</label>
                    <select class="form-select" id="role" name="linked" required>
                        <option value="<?= old('linked',$data['linkedToHSC']) ?>"><?php echo $data['linkedToHSC']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>



                <div class="mb-3">
                    <label for="role" class="form-label">Does she been taking ARV?:</label>
                    <select class="form-select" id="role" name="taking" required>
                        <option value="<?= old('taking',$data['takingARV']) ?>"><?php echo $data['takingARV']?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

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
include "jsProcess/updateYWdata.php";
?>

</body>

</html>