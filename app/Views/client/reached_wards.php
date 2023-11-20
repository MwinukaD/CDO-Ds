
<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">REACHED WARDS
            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addSchoolModal"
                    id="add_SchoolButton">Add Ward</button>
        </h4>
        <p class="text-center">So far <?php echo $reached_wards ?> Wards have been reached,</p>

        <!-- Data Table -->
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>SNo</th>
                <th>Ward Name</th>
                <th>WARD OFFICERS</th>
                <th>YOUNG WOMEN</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($wards as $index => $data): ?>
                <tr>
                    <td>
                        <?php echo $index + 1 ?>
                    </td>
                    <td>
                        <?php echo $data['ward_name'].' WARD'?>
                    </td>
                    <td>
                        <a href="<?php echo route_to('/reached/ward-officers/', $data['id']) ?>" class="weoButton btn btn-success"><i class="fas fa-forward"></i>
                    </td>
                    <td><a href="<?php echo route_to('/reached/yw/', $data['id']) ?>" class="studentClub btn btn-success"><i
                                class="fas fa-forward"></i></a>
                    </td>

                    <td class="removed_ward" id="<?php echo $data['id'] ?>"><button class=" btn btn-danger"><i
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
                <h5 class="modal-title" id="addSchoolModalLabel">Add Ward</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form fields go here -->

                <form id="wardForm" method="POST" action="#">
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Ward Name</label>
                        <input type="text" class="form-control" id="schoolName" name="ward" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveSchoolButton">Save Ward</button>
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
include "jsProcess/addNewWard.php";
include "jsProcess/removeWard.php";
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

        const schoolTypes = [
            "KIPERA",
            "KIBATI",
            "PEMBA",
            "MUHONDA",
            "MASKATI",
            "MADIZINI"
            // Add more school types as needed
        ];
        const schoolTypeInput = $("#schoolType");
        const schoolTypeDropdown = $("#schoolTypeDropdown");

        schoolTypeInput.on("input", function () {
            const filterValue = $(this).val().toLowerCase();
            const filteredTypes = schoolTypes.filter(type =>
                type.toLowerCase().includes(filterValue)
            );

            schoolTypeDropdown.empty();
            filteredTypes.forEach(type => {
                const suggestion = $("<div>")
                    .addClass("dropdown-item suggestion-item")
                    .text(type);
                suggestion.click(function () {
                    schoolTypeInput.val(type);
                    schoolTypeDropdown.empty();
                });
                schoolTypeDropdown.append(suggestion);
            });
        });


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
</script>
</body>

</html>