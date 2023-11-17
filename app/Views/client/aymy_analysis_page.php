<?php include 'layout/topSection.php' ?>
<!-- Page content -->
<div class="content-container">
    <div class="container">
        <h5 class="text-center">2023 Project Analysis </h5><hr>
        <h5><span class="btn btn-primary"><?php echo ($numberOfAdolescent+$numberOfYoungWomen)?></span> Direct Beneficiares Reached = <?php echo number_format((($numberOfAdolescent+$numberOfYoungWomen)/($targetYoungWomen + $targetAdolescent))*100,2)?>%</h5><hr>
                <div class="row">
                    <div class="col-md-6">
                        <p><span class="btn btn-danger"><?php echo $numberOfAdolescent ?></span> Adolescent Girls Reached = (
                            <?php echo number_format(($numberOfAdolescent/$targetAdolescent)*100,2) ?>%
                            )</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                                 aria-valuenow="<?php echo number_format(($numberOfAdolescent/$targetAdolescent)*100,2) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format(($numberOfAdolescent/$targetAdolescent)*100,2)?>%">
                                <?php echo number_format(($numberOfAdolescent/$targetAdolescent)*100,2) ?>%
                            </div>
                        </div><br>
                        <!--ADOLESCENT GIRLS TRAINED -->
                        <p><span class="btn btn-outline-danger"><?php echo $adolescentTrained ?></span> Adolescent Girls Trained = (<?php echo number_format(($adolescentTrained/$targetAdolescent)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-danger"><?php echo $adolescentTested ?></span> Adolescent Girls Tested = (<?php echo number_format(($adolescentTested/$targetAdolescent)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-danger"><?php echo $adolescentTestedPositive ?></span> Adolescent Girls Tested Positive = (<?php echo number_format(($adolescentTestedPositive/$targetAdolescent)*100,2)?>%)</p><!--ADOLESCENT GIRLS NEGATIVE -->
                        <p><span class="btn btn-outline-danger"><?php echo $adolescentTestedNegative ?></span> Adolescent Girls Tested Negative = (<?php echo number_format(($adolescentTestedNegative/$targetAdolescent)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-danger"><?php echo $adolescentLinked ?></span> Adolescent Girls Linked to HSCs = (<?php echo number_format(($adolescentLinked/$targetAdolescent)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-danger"><?php echo $adolescentStartedARV ?></span> Adolescent Girls Started ARVs = (<?php echo number_format(($adolescentStartedARV/$targetAdolescent)*100,2)?>%)</p>
                    </div>


                    <div class="col-md-6">
                        <p><span class="btn btn-success"><?= $numberOfYoungWomen ?></span> Young-Women Reached = (<?php echo number_format(($numberOfYoungWomen/$targetYoungWomen)*100,2) ?>%)</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success active" role="progressbar"
                                 aria-valuenow="<?php echo number_format(($numberOfYoungWomen/$targetYoungWomen)*100,2)?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo number_format(($numberOfYoungWomen/$targetYoungWomen)*100,2) ?>%">
                                <?php echo number_format(($numberOfYoungWomen/$targetYoungWomen)*100,2) ?>%
                            </div>
                        </div><br>
                        <p><span class="btn btn-outline-success"><?php echo $ywTrained ?></span> Young Women Trained = (<?php echo number_format(($ywTrained/$targetYoungWomen)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-success"><?php echo $ywTested ?></span> Young Women Tested = (<?php echo number_format(($ywTested/$targetYoungWomen)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-success"><?php echo $ywTestedPositive ?></span> Young Women Tested Positive = (<?php echo number_format(($ywTestedPositive/$targetYoungWomen)*100,2)?>%)</p><!--ADOLESCENT GIRLS NEGATIVE -->
                        <p><span class="btn btn-outline-success"><?php echo $ywTestedNegative ?></span> Young Women Tested Negative = (<?php echo number_format(($ywTestedNegative/$targetYoungWomen)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-success"><?php echo $ywLinked ?></span> Young Women Linked to HSCs = (<?php echo number_format(($ywLinked/$targetYoungWomen)*100,2)?>%)</p>
                        <p><span class="btn btn-outline-success"><?php echo $ywStartedARV ?></span> Young Women Started ARVs = (<?php echo number_format(($ywStartedARV/$targetYoungWomen)*100,2)?>%)</p>
                    </div>
                    </div>
                </div><hr>


        <!-------------------ECONOMIC STATUS ANALYSIS------------------------>
        <h5><span class="btn btn-primary"><i class="fa fa-chart-bar"></i></span> Economic status analysis</h5><hr>
        <div class="row">
            <div class="col-md-6">
                <p><span class="btn btn-outline-danger"><?php echo $employedParents ?></span> Live with Employed Parents/Gardians = (<?php echo number_format(($employedParents/$targetAdolescent)*100,2)?>%)</p>
                <p><span class="btn btn-outline-danger"><?php echo $unemployedParents ?></span> Live with Self Employed Parents/Gardians = (<?php echo number_format(($unemployedParents/$targetAdolescent)*100,2)?>%)</p>
                <p><span class="btn btn-outline-danger"><?php echo $joblessParents ?></span> Live with Jobless Parents/Gardians = (<?php echo number_format(($joblessParents/$targetAdolescent)*100,2)?>%)</p>
            </div>



            <div class="col-md-6">
                <p><span class="btn btn-outline-success"><?php echo $employedYW ?></span> Employed Young Women = (<?php echo number_format(($employedYW/$targetYoungWomen)*100,2)?>%)</p>
                <p><span class="btn btn-outline-success"><?php echo $unemployedYW ?></span> Self Employed Young Women = (<?php echo number_format(($unemployedYW/$targetYoungWomen)*100,2)?>%)</p>
                <p><span class="btn btn-outline-success"><?php echo $joblessYW ?></span> Jobless Young Women = (<?php echo number_format(($joblessYW/$targetYoungWomen)*100,2)?>%)</p>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<!-- Include your scripts here -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>