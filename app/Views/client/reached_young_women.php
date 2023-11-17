
<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">REACHED YOUNG-WOMEN (yw)
            <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addSchoolModal"
                    id="add_SchoolButton">Register YW</button>
        </h4>
        <p class="text-center">
            <?php echo $totalYW ?> Reached /
            <?php echo $totalTested ?> Tested HIV /
            <?php echo $totalTakingARVs ?> Taking ARVs /
            <?php echo $totalLinkedToHSC ?> Linked-HSCs /
            <?php echo $totalTrained ?> Trained
        </p>

        <!-- Data Table -->
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>SNo</th>
                <th>FULLNAME</th>
                <th>AGE</th>
                <th>Job Status</th>
                <th>PhoneNo</th>
                <th>TRAINED?</th>
                <th>TESTED?</th>
                <th>Test Result</th>
                <th>Linked-HSC</th>
                <th>Taking ARVs</th>
                <th>EDIT</th>
                <th>TRASH</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($yw as $index => $data): ?>
                <tr>
                    <td>
                        <?php echo $index + 1 ?>
                    </td>
                    <td>
                        <?php echo $data['fullname']?>
                    </td>
                    <td>
                        <?php echo $data['age']?>
                    </td>
                    <td>
                        <?php echo $data['job']?>
                    </td>
                    <td>
                        <?php echo $data['contacts']?>
                    </td>
                    <td>
                        <?php if($data['trained']=='YES'){?>
                            <i class="fas fa-check btn btn-outline-success"></i>
                        <?php }else{?>
                        <i class="fas fa-times btn btn-outline-danger"></i>
                        <?php } ?></php>
                    </td>

                    <td>
                        <?php if($data['testedHIV']=='YES'){?>
                            <i class="fas fa-check btn btn-outline-success"></i>
                        <?php }else{?>
                        <i class="fas fa-times btn btn-outline-danger"></i>
                        <?php } ?></php>
                    </td>
                    <td>
                        <?php if($data['result']=='POSITIVE'){?>
                            <button class=" btn btn-outline-danger">POSITIVE</button>
                        <?php }else{?>
                        <button class="btn btn-outline-success">NEGATIVE</button>
                        <?php } ?></php>
                    </td>
                    <td>
                        <?php if($data['linkedToHSC']=='YES'){?>
                            <i class="fas fa-check btn btn-outline-success"></i>
                        <?php }else{?>
                        <i class="fas fa-times btn btn-outline-danger"></i>
                        <?php } ?></php>
                    </td>
                    <td>
                        <?php if($data['takingARV']=='YES'){?>
                            <i class="fas fa-check btn btn-outline-success"></i>
                        <?php }else{?>
                        <i class="fas fa-times btn btn-outline-danger"></i>
                        <?php } ?></php> </td>

                    <td class="editWO">
                        <a href="<?php echo route_to('/edit/yw/',$data['id']) ?>" class=" btn btn-outline-primary" id="edit-btn"><i class="fas fa-edit"></i></a>
                    </td>

                    <td>
                        <button class="removedYW btn btn-danger" id="<?php echo $data['id'] ?>"><i class="fas fa-trash"></i></button>
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
                <h5 class="modal-title" id="addSchoolModalLabel">REGISTER NEW YW</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="wardForm" method="POST" action="#">
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">FullName</label>
                        <input type="text" class="form-control" id="schoolName" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Age</label>
                        <input type="text" class="form-control" id="schoolName" name="age" required>
                    </div>
                    <div class="mb-3">
                        <label for="parentJobStatus" class="form-label">Job Status</label>
                        <select class="form-select" id="parentJobStatus" name="job" required>
                            <option value="EMPLOYED">EMPLOYED</option>
                            <option value="SELF EMPLOYED">SELF EMPLOYED</option>
                            <option value="JOBLESS">JOBLESS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="schoolName" class="form-label">Phone No</label>
                        <input type="text" class="form-control" id="schoolName" name="phone" required>
                    </div>
                    <input type="hidden" class="form-control" id="schoolName" name="wardID" value="<?=$wardID?>" required>
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
                        <label for="parentJobStatus" class="form-label">What's her test result?</label>
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
include "jsProcess/addNewYoungWomen.php";
include "jsProcess/removeYoungWomen.php";
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


</script>
</body>

</html>