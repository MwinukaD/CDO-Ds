<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">SCHOOLS/CLUBS MEMBERS
            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addSchoolModal"
                id="add_SchoolButton"><i class="fas fa-user-alt"></i> Add Student</button>
        </h4>
        <p class="text-center">So far we have
            <?php echo $totalstudents ?> students registered in this club,
            <?php foreach ($schooldata as $school): ?>
                [School :
                <?= $school['school_name'] . '  SEC SCHOOL ' ?> | Ward:
                <?= $school['ward'] ?> ]
            <?php endforeach ?>
        </p>

        <!-- Data Table -->
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>Fullname</th>
                    <th>Class</th>
                    <th>Age</th>
                    <th>Live with</th>
                    <th>Parent's/Gardian's job status</th>
                    <th>Trained?</th>
                    <th>Tested?</th>
                    <th>Test Result</th>
                    <th>Linked?</th>
                    <th>Taking ARV?</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $index => $data): ?>
                    <tr>
                        <td>
                            <?php echo $index + 1 ?>
                        </td>
                        <td>
                            <?php
                            $membership = $data['membership'];
                            if ($membership == "Chairperson") { ?>
                                <i class="fas fa-user-alt" style="color:red"></i>
                            <?php }
                            if ($membership == "Secretary") { ?>
                                <i class="fas fa-user-alt" style="color:green"></i>
                            <?php }
                            echo $data['firstname'] . '  ' . $data['lastname']
                                ?>

                        </td>
                        <td>
                            <?php echo 'FORM  ' . $data['student_class'] ?>
                        </td>
                        <td>
                            <?php echo $data['student_age'] ?>
                        </td>
                        <td>
                            <?php echo $data['live_with'] ?>
                        </td>
                        <td>
                            <?php echo $data['parent_jobType'] ?>
                        </td>
                        <td>
                            <?php if($data['trained']=='YES'){?>
                                <i class="fas fa-check btn btn-outline-success"> YES</i>
                            <?php }else{?>
                            <i class="fas fa-times btn btn-outline-danger"> NO</i>
                            <?php } ?></php>
                        </td>
                        <td>
                            <?php if($data['tested']=='YES'){?>
                                <i class="fas fa-check btn btn-outline-success"> YES</i>
                            <?php }else{?>
                            <i class="fas fa-times btn btn-outline-danger"> NO</i>
                            <?php } ?></php>
                        </td>
                        <td>
                            <?php if($data['result']=='NEGATIVE'){?>
                                <button class=" btn btn-outline-success">NEGATIVE</button>
                            <?php }else{?>
                            <i class="btn btn-outline-danger"> POSITIVE</i>
                            <?php } ?></php>
                        </td>
                        <td>
                            <?php if($data['linked']=='YES'){?>
                                <i class="fas fa-check btn btn-outline-success"> YES</i>
                            <?php }else{?>
                            <i class="fas fa-times btn btn-outline-danger"> NO</i>
                            <?php } ?></php>
                        </td>
                        <td>
                            <?php if($data['startedARV']=='YES'){?>
                                <i class="fas fa-check btn btn-outline-success"> YES</i>
                            <?php }else{?>
                            <i class="fas fa-times btn btn-outline-danger"> NO</i>
                            <?php } ?></php>
                        </td>
                        <td>
                            <a href=" <?php echo route_to('/edit/student/',$data['id'])?>" class=" btn btn-success"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class="removed_student_id" id="<?php echo $data['id'] ?>">
                            <button class=" btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>

                <?php endforeach ?>
                <!-- Add more rows if needed -->
            </tbody>
        </table>
    </div>
</div>

<!--- POPUP FORM TO ADD NEW SCHOOL--->
<!-- Add School Modal -->
<div class="modal fade" id="addSchoolModal" tabindex="-1" aria-labelledby="addSchoolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSchoolModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form fields go here -->

                <form id="schoolForm" method="POST">
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Student Firstname</label>
                        <input type="text" class="form-control" id="schoolName" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Student Lastname</label>
                        <input type="text" class="form-control" id="schoolName" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Student Class / Form?</label>
                        <select class="form-select" id="parentJobStatus" name="class" required>
                            <option value="FORM 1">FORM 1</option>
                            <option value="FORM 2">FORM 2</option>
                            <option value="FORM 3">FORM 3</option>
                            <option value="FORM 4">FORM 4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Student Age</label>
                        <input type="text" class="form-control" id="schoolName" name="age" required>
                    </div>

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Membership</label>
                        <select class="form-select" id="parentJobStatus" name="membership" required>
                            <option value="NORMAL">Normal Member</option>
                            <option value="CHAIR PERSON">Chairperson</option>
                            <option value="SECRETARY">Secretary</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Parent Job Status</label>
                        <select class="form-select" id="parentJobStatus" name="parent_job_status" required>
                            <option value="EMPLOYED">Employed</option>
                            <option value="SELF EMPLOYED">Self Employed</option>
                            <option value="JOBLESS">Jobless</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Does she trained?</label>
                        <select class="form-select" id="parentJobStatus" name="trained" required>
                            <option value="NO">NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Does she Tested?</label>
                        <select class="form-select" id="parentJobStatus" name="tested" required>
                            <option value="NO">NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Test Result?</label>
                        <select class="form-select" id="parentJobStatus" name="result" required>
                            <option value="NEGATIVE">NEGATIVE</option>
                            <option value="POSITIVE">POSITIVE</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Does she Linked-HSC?</label>
                        <select class="form-select" id="parentJobStatus" name="linked" required>
                            <option value="NO">NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Does she Taking ARVs?</label>
                        <select class="form-select" id="parentJobStatus" name="taking" required>
                            <option value="NO">NO</option>
                            <option value="YES">YES</option>
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="schoolType" class="form-label">Parent Job</label>
                        <input type="text" class="form-control" id="schoolType" name="parent_job" required>
                        <div id="schoolTypeDropdown" class="dropdown"></div>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Live With</label>
                        <input type="text" class="form-control" id="schoolName" name="live_with" required>
                    </div>
                    <input type="hidden" name="schoolID" value="<?php echo $schoolID ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveSchoolButton">Save Student</button>
                    </div>
                </form>



            </div>

        </div>
    </div>
</div>
<!----  END OF POPUP  ----->

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables and Buttons JS -->

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
//AJAX CODE FOR  ADDING NEW SCHOOL
include "jsProcess/addNewStudent.php";
include "jsProcess/removeStudent.php";
?>



<script>
    $(document).ready(function () {
        var dataTable = $('#myTable').DataTable({
            paging: true, // Enable pagination
            searching: true, // Enable search functionality
            ordering: true, // Enable column sorting
            lengthChange: false, // Hide the "Show X entries" dropdown
            info: false, // Hide information about showing X of Y entries
            language: {
                search: "", // Remove search label
                searchPlaceholder: "Search...", // Placeholder for search input
            },
            dom: 'Bfrtip', // Display export buttons
            buttons: [
                'csv', 'excel', 'pdf', 'print' // Enable CSV, Excel, PDF, and Print buttons
            ]
        });

        //LINK TO STUDENTS PAGE
        $(".t_teacherID").on('click', function () {
            $schoolID = $(this).attr('id');
            $.ajax({
                "data": { id: $schoolID },
                "method": "POST",
                "url": "<?php echo base_url('/club/member/students/') ?>",
                error: function (xhr, status, error) {
                    alert("Error: " + xhr.responseText);
                }
            })
        })
    })
</script>
</body>

</html>