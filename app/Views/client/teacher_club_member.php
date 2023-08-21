<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">SCHOOLS/CLUBS TEACHERS
            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addSchoolModal"
                id="add_SchoolButton"><i class="fas fa-user-alt"></i> Add Teacher</button>
        </h4>
        <p class="text-center">So far we have
            <?php echo $totalteachers ?> students registered in this club,
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
                    <th>Membership</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $index => $data): ?>
                    <tr>
                        <td>
                            <?php echo $index + 1 ?>
                        </td>
                        <td>
                            <?php echo $data['firstname'] . '  ' . $data['lastname'] ?>
                        </td>
                        <td>
                            <?php echo $data['title'] ?>
                        </td>
                        <td class="removed_teacher" id="<?php echo $data['id'] ?>"><button class=" btn btn-danger"><i
                                    class="fas fa-trash"></i></button></td>
                    </tr>
                <?php endforeach ?>

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
                <h5 class="modal-title" id="addSchoolModalLabel">Add Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form fields go here -->

                <form id="schoolForm" method="POST" action="#">
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Teacher Firstname</label>
                        <input type="text" class="form-control" id="schoolName" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Teacher Lastname</label>
                        <input type="text" class="form-control" id="schoolName" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Teacher Title</label>
                        <select class="form-select" id="parentJobStatus" name="title" required>
                            <option value="Head Teacher">Head Teacher</option>
                            <option value="Unasihi Teacher">Unasihi Teacher</option>
                        </select>
                    </div>

                    <input type="hidden" name="school_id" value="<?php echo $schoolID ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveSchoolButton">Save Teacher</button>
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
include "jsProcess/addNewTeacher.php";
include "jsProcess/removeTeacher.php";
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

    })
</script>
</body>

</html>