<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">AYMY UPLOADED FILES
            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addSchoolModal"
                id="add_SchoolButton"><i class="fas fa-user-alt"></i> Upload New FIle</button>
        </h4>
        <p class="text-center">So far we have
            <?php echo $totalUploadedDocs; ?> uploaded files <a href="<?php echo base_url('/trashed/files/') ?>"
                style="font-size:15px"> <i class="fas fa-forward" style="color:#DB1F48">
                    <?php echo $totalTrashedFiles ?> Files Deleted
                </i>
            </a>
        </p>
        <!-- Data Table -->
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>File Title</th>
                    <th>File Type</th>
                    <th>Who Uploaded</th>
                    <th>Uploaded Date</th>
                    <th>Download</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uploadedDocs as $index => $data): ?>
                    <tr>
                        <td>
                            <?php echo $index + 1 ?>
                        </td>
                        <td>
                            <?php echo $data['title'] ?>
                        </td>
                        <td>
                            <?php echo $data['type'] ?>
                        </td>
                        <td>
                            <?php echo $data['firstname'] . '  ' . $data['lastname'] ?>
                        </td>
                        <td>
                            <?php echo $data['uploaded_date'] ?>
                        </td>
                        <td><a href="<?php echo base_url('/uploads/' . $data['file']) ?>" style="font-size:17px;"><i
                                    class="fas fa-download"></i></a>
                        </td>

                        <td><button class="removed_doc_ID  btn btn-danger" data-id1="<?php echo $data['id'] ?>"
                                data-id2="<?php
                                $session = session();
                                echo $session->get('employee_id'); ?>"><i class="fas fa-trash"></i>
                            </button>
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

                <form id="fileSubmitForm" method="POST" action="#">

                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label"><b>Document Type</b></label>
                        <select class="form-select" id="parentJobStatus" name="type" required>
                            <option value="Monthly-Report">Monthly-Report</option>
                            <option value="Quartery-Report">Quartery-Report</option>
                            <option value="Activity-Report">Activity-Report</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <input type="hidden" class="form-control" id="schoolName" name="project" value="AYMY" required>


                    <div class="mb-3">
                        <label for="schoolName" class="form-label">File Title</label>
                        <input type="text" class="form-control" id="schoolName" name="fileTitle" required>
                    </div>

                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Upload File</label>
                        <input type="file" class="uploadedfile form-control" id="schoolName" name="uploaded_file"
                            required>
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
include "jsProcess/addNewFile.php";
include "jsProcess/removeFile.php";
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