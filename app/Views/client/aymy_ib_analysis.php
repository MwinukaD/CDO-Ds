<?php include 'layout/topSection.php'?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h5 class="text-center">Indirect Beneficiares </h5><hr>
        <h5><span class="btn btn-outline-dark"><?php echo ($reachedNurses+$reachedWEO+$reachedCHW+$reachedHTeachers+$reachedUTeachers)?></span> Indirect Beneficiares Reached </h5><hr>
        <div class="row">
            <div class="col-md-6">
                <h5><span class="btn btn-outline-danger"><?php echo $reachedNurses+$reachedWEO+$reachedCHW ?></span> Reached At Community Level </h5>
                <hr>
                <!--ADOLESCENT GIRLS TRAINED -->
                <p><span class="btn btn-outline-danger"><?php echo $reachedNurses ?></span> Nurses Reached</p>
                <p><span class="btn btn-outline-danger"><?php echo $trainedNurses ?></span> Nurses Trained</p> <hr>

                <p><span class="btn btn-outline-secondary"><?php echo $reachedWEO ?></span> WEOs Reached</p>
                <p><span class="btn btn-outline-secondary"><?php echo $trainedWEO ?></span> WEOs Trained</p><hr>


                <p><span class="btn btn-outline-primary"><?php echo $reachedCHW ?></span> CHWs Reached</p>
                <p><span class="btn btn-outline-primary"><?php echo $trainedCHW ?></span> CHWs Trained</p><hr>
            </div>


            <div class="col-md-6">
                <h4><span class="btn btn-success"><?php echo $reachedHTeachers+$reachedUTeachers ?></span> Reached At School Level </h4>
               <hr>

                <p><span class="btn btn-primary"><?php echo $reachedHTeachers ?></span> Head Teachers Reached </p>
                <p><span class="btn btn-primary"><?php echo $trainedHTeachers ?></span> Trained Head Teachers </p><hr>

                <p><span class="btn btn-dark"><?php echo $reachedUTeachers ?></span> Counseling Teachers Reached </p>
                <p><span class="btn btn-dark"><?php echo $trainedUTeachers ?></span> Trained Counseling Teachers </p><hr>
            </div>
        </div>
    </div><hr>
</div>
</div>
</div>
</div>

<!-- Include your scripts here -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
