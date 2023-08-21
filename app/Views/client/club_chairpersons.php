<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">CLUBS CHAIRPERSONS</h4>
        <p class="text-center">So far we have
            <?php echo $totalChairpersons ?> Clubs Chairpersons
        </p>
        <!-- Data Table -->
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>Fullname</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Live With</th>
                    <th>Parent Job</th>
                    <th>School</th>
                    <th>Ward</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clubChairpersons as $index => $data): ?>
                    <tr>
                        <td>
                            <?php echo $index + 1 ?>
                        </td>
                        <td>
                            <?php echo $data['firstname'] . '  ' . $data['lastname'] ?>
                        </td>
                        <td>
                            <?php echo $data['student_age'] ?>
                        </td>
                        <td>
                            <?php echo "FORM  " . $data['student_class'] ?>
                        </td>
                        <td>
                            <?php echo $data['live_with'] ?>
                        </td>
                        <td>
                            <?php echo $data['parent_job'] ?>
                        </td>
                        <td>
                            <?php echo $data['school_name'] . ' SEC . SCHOOL' ?>
                        </td>
                        <td>
                            <?php echo $data['ward'] ?>
                        </td>
                    </tr>

                <?php endforeach ?>
                <!-- Add more rows if needed -->
            </tbody>
        </table>
    </div>
</div>


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
//include "jsProcess/addNewStudent.php";
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
    })
</script>
</body>

</html>