<?php include 'layouts/topSectionCP.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h4 class="text-center">CDO-CP Admin</h4>
        <!--<p class="text-center">So far we have
            <?php// echo $totalHeadTeachers ?> Unasihi Teachers
        </p>-->
        <!-- Data Table -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-users panel-icon"></i>
                            <h5 class="card-title">BIBI/BABU</h5>
                            <p class="card-text">Click here to see all CDO sponsored bibi/babu related informations and documents</p>
                            <a href="<?php echo base_url('/cp-bibibabu/'); ?>"
                               class="btn btn-success btn-rounded">Let's
                                Go</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-user panel-icon"></i>
                            <h5 class="card-title">NL Students</h5>
                            <p class="card-text">Click here to see all CDO sponsored students related informations and documents</p>
                            <a href="<?php echo base_url('/project/changarawe/'); ?>"
                               class="btn btn-success btn-rounded">Let's
                                Go</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-circle panel-icon"></i>
                            <h5 class="card-title">Social Day</h5>
                            <p class="card-text">Here you will find/store all the documents related to Changarawe Project.</p>
                            <a href="<?php echo base_url('/project/changarawe/'); ?>"
                               class="btn btn-success btn-rounded">Let's
                                Go</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-book-open panel-icon"></i>
                            <h5 class="card-title">SWO & IT Reports</h5>
                            <p class="card-text">Here you will find/store all the documents related to Changarawe Project.</p>
                            <a href="<?php echo base_url('/project/changarawe/'); ?>"
                               class="btn btn-success btn-rounded">Let's
                                Go</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-book panel-icon"></i>
                            <h5 class="card-title">L & PO Reports</h5>
                            <p class="card-text">Here you will find/store all the documents related to Changarawe Project.</p>
                            <a href="<?php echo base_url('/project/changarawe/'); ?>"
                               class="btn btn-success btn-rounded">Let's
                                Go</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="far fa-file panel-icon"></i>
                            <h5 class="card-title">Other Docs</h5>
                            <p class="card-text">Here you will find/store all the documents related to Changarawe Project.</p>
                            <a href="<?php echo base_url('/project/changarawe/'); ?>"
                               class="btn btn-success btn-rounded">Let's
                                Go</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables and Buttons JS -->

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>


</body>

</html>