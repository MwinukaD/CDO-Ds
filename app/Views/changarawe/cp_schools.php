<?php include 'layouts/topSectionCP.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">REGISTERED CP SCHOOLS
            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addSchoolModal"
                    id="add_SchoolButton"><i class="fas fa-user-alt"></i> Add Bibi/Babu</button>
        </h4>
        <p class="text-center">So far we have
            <?php echo $countAllCPschools ?> registered Changarawe Projects Schools,

        </p>

        <!-- Data Table -->
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>SNo</th>
                <th>SCHOOL NAME</th>
                <th>CONTACTS</th>
                <th>HEAD TEACHER</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($schooldata as $index => $data): ?>
            <tr>
                <td>
                    <?php echo $index + 1 ?>
                </td>
                <td>
                    <?php echo  $data['school_name'] ?>
                </td>
                <td>
                    <?php  echo $data['contacts'] ?>
                </td>
                <td>
                    <?php  echo $data['head_teacher'] ?>
                </td>

                <td class="removed_student_id" id="<?php //echo $data['id'] ?>"><button class=" btn btn-danger"><i
                            class="fas fa-trash"></i></button></td>
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
                <h5 class="modal-title" id="addSchoolModalLabel">Add New BIBI/BABU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form fields go here -->

                <form id="schoolForm" method="POST" action="#" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="schoolName" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="schoolName" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Birth Year</label>
                        <input type="text" class="form-control" id="schoolName" name="birth_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Health Status</label>
                        <select class="form-select" id="parentJobStatus" name="health_status" required>
                            <option value="Most-Sick">Most-Sick</option>
                            <option value="Good-Health">Good-Health</option>
                            <option value="Long-term Diseases">Long-term Diseases</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Desease/s</label>
                        <input type="text" class="form-control" id="schoolName" name="deseases" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Live-with</label>
                        <input type="text" class="form-control" id="schoolName" name="live_with" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Source of income</label>
                        <input type="text" class="form-control" id="schoolName" name="income_source" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Passport</label>
                        <input type="text" class="form-control" id="schoolName" name="passport" required>
                    </div>

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
include "jsProcess/addNewBibiBabu.php";
//include "jsProcess/removeStudent.php";
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