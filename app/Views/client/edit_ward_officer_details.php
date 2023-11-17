<?php include 'layout/topSection.php' ?>
<div class="content-container">
    <div class="container">
        <h4 class="text-center">EDIT WARD OFFICER DATA</h4>
<?php foreach( $details as $data):?>
        <form action="" method="POST" id="update_wo_data">
            <div class="mb-3">
                <label for="username" class="form-label">Firstname:</label>
                <input type="text" class="form-control" id="username" name="fname" value="<?= old('fname',$data['wo_firstname'])?> " placeholder="<?php echo $data['wo_firstname']; ?>">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Lastname:</label>
                <input type="text" class="form-control" id="username" name="lname" value="<?= old('lname', $data['wo_lastname'])?>" placeholder="<?php echo $data['wo_lastname']; ?>">
            </div>

            <div class="mb-3">
                <label for="parentJobStatus" class="form-label">Title</label>
                <select class="form-select" id="parentJobStatus" name="title" required>
                    <option value="<?= $data['wo_title'] ?>"><?= $data['wo_title'] ?></option>
                    <option value="WARD EDUCATION OFFICER">WEO</option>
                    <option value="COMMUNITY HEALTH WORKER">CHW</option>
                    <option value="NURSE">NURSE</option>
                </select>
            </div>


            <input type="hidden" class="form-control" id="username" name="oid" value="<?php echo $data['id']; ?>">


            <div class="mb-3">
                <label for="username" class="form-label">Age:</label>
                <input type="text" class="form-control" id="username" name="age" value="<?= old('age', $data['wo_age'])?>" placeholder="<?php echo $data['wo_age']?>">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Contact:</label>
                <input type="text" class="form-control" id="username" name="contact" value="<?= old('contact', $data['wo_contacts'])?>" placeholder="<?php echo $data['wo_contacts']?>">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Is he/ she been trained?:</label>
                <select class="form-select" id="role" placeholder="sdsd" name="trained" required>
                    <option value="<?= old('trained',$data['trained']) ?>"><?php echo $data['trained']?></option>
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
include "jsProcess/updateWOdata.php";
?>

</body>

</html>