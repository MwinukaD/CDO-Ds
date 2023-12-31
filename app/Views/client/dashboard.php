<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CDO-DS</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    footer {
      font-size: 12px;
    }

    /* Panel Icon Styles */
    .panel-icon {
      font-size: 2 rem;
      margin-bottom: 10px;
      background: -webkit-linear-gradient(#02aab0, #00cdac);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="<?php echo base_url('home') ?>">CDO-Ds</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('home') ?>"><i class="fa fa-home"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="https://cdo.or.tz/"><i class="fa fa-globe"></i> CDO-Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('/login/activity') ?>"><i class="fa fa-link"></i>
            Login-Activity</a>
        </li>

          <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url('/aymy-analysis/') ?>"><i class="fa fa-chart-bar"></i>
                  Project-Analysis</a>
          </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo site_url('account/profile') ?>"><i class="far fa-user-circle"></i>
            Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('account/logout') ?>"><i class="fas fa-sign-out-alt"></i>
            Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
        <!--
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="far fa-user-circle panel-icon"></i>
            <h5 class="card-title">ChangaraweProject</h5>
            <p class="card-text">Here you will find/store all the documents related to Changarawe Project.</p>
            <a href="<?php //echo base_url('/project/changarawe/'); ?>"
              class="btn btn-primary btn-rounded">Let's
              Go</a>
          </div>
        </div>
      </div>-->
      <div class="col-md-6 mb-4">
        <div class="card"> 
          <div class="card-body text-center">
            <i class="fa fa-users panel-icon" style="font-size: 60px;"></i>
            <h5 class="card-title">SCHOOL LEVEL</h5>
            <a href="<?php echo base_url('/reached/school/'); ?>" class="btn btn-primary btn-rounded">Let's Go</a>
          </div>
        </div>
      </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-users panel-icon" style="font-size: 60px;"></i>
                    <h5 class="card-title">COMMUNITY LEVEL</h5>
                    <a href="<?php echo base_url('/reached-wards/'); ?>" class="btn btn-primary btn-rounded">Let's Go</a>
                </div>
            </div>
        </div>
        <!--<div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-users panel-icon" style="font-size: 60px;"></i>
                    <h5 class="card-title">Community Health Workers Reached</h5>
                    <a href="<?php //echo base_url('/reached/school/'); ?>" class="btn btn-primary btn-rounded">Let's Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-users panel-icon" style="font-size: 60px;"></i>
                    <h5 class="card-title">Nurses and Goverment Officials Reached</h5>
                    <a href="<?php //echo base_url('/reached/school/'); ?>" class="btn btn-primary btn-rounded">Let's Go</a>
                </div>
            </div>
        </div>-->
     <!-- <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-folder panel-icon"></i>
            <h5 class="card-title">WatotoWetuTunuYetu</h5>
            <p class="card-text">Here you will find/store all the documents related to #WatotoWetuTunuYetu.</p>
            <a href="<?php echo base_url('/project/afyayangumaishayangu/'); ?>"
              class="btn btn-primary btn-rounded">Let's
              Go</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="far fa-calendar-alt panel-icon"></i>
            <h5 class="card-title">MtotoKwanza</h5>
            <p class="card-text">Here you will find/store all the documents related to Mtoto Kwanza. </p>
            <a href="<?php echo base_url('/project/afyayangumaishayangu/'); ?>"
              class="btn btn-primary btn-rounded">Let's
              Go</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-comments panel-icon"></i>
            <h5 class="card-title">InclusiveEductaion</h5>
            <p class="card-text">Here you will find/store all the documents related to Inclusive Education. </p>
            <a href="<?php echo base_url('/project/afyayangumaishayangu/'); ?>"
              class="btn btn-primary btn-rounded">Let's
              Go</a>
          </div>
        </div>
      </div>-->
     <!-- <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <i class="far fa-money-bill-alt panel-icon"></i>
            <h5 class="card-title">#Administration</h5>
            <p class="card-text">All Administration Related Files/ Folders are stored in this panel, No authentification
              needed to eccess those files/folders.</p>
            <a href="<?php echo base_url('/project/afyayangumaishayangu/'); ?>"
              class="btn btn-primary btn-rounded">Let's
              Go</a>
          </div>
        </div>
      </div>-->
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>