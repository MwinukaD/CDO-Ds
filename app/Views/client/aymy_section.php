<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>

  <!-- Add DataTables CSS link -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- TABLE EXPORT CSS CODE -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="/assets/css/style.css">
  <style>
    body {
      background: linear-gradient(to bottom right, #002984, #0066FF);
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background: linear-gradient(to bottom right, #002984, #0066FF);
    }

    .navbar-brand {
      color: #FFFFFF;
      font-weight: 600;
    }

    .nav-link {
      color: #FFFFFF;
      font-size: 14px;
    }

    .nav-link.active {
      font-weight: 400;
    }

    .user-profile {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .user-profile .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }

    .reached-title {
      font-size: 15px;
      font-weight: 600;
      color: #2E3192;
      margin-bottom: 1em;
    }

    .project-summary {
      font-size: 23px;
      font-weight: 600;
      color: #2E3192;
      margin-bottom: 1em;

    }

    .user-profile .profile-details {
      margin-bottom: 20px;
    }

    .user-profile .profile-details {
      font-size: 12px;
      color: #666666;
      margin-bottom: 5px;
    }

    .user-profile .profile-details .label {
      font-weight: 600;
      color: #2E3192;
    }

    .user-profile .profile-details table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
    }

    .user-profile .profile-details th,
    .user-profile .profile-details td {
      padding: 4px;
      border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .user-profile .profile-details .label {
      font-weight: bold;
      white-space: nowrap;
    }

    .sidebar {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .sidebar .nav-link {
      color: #2E3192;
      font-size: 14px;
    }

    .content {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .content .panel {
      margin-bottom: 20px;
    }

    .content .panel-title {
      font-size: 16px;
      font-weight: 600;
      color: #2E3192;
      margin-bottom: 10px;
    }

    .content .panel-description {
      font-size: 14px;
      color: #666666;
      margin-bottom: 10px;
    }

    .content .panel-actions {
      margin-top: 20px;
    }

    .content .panel-actions .btn {
      margin-right: 10px;
    }

    /* Search Input Style */
    #dataTable_filter {
      text-align: right;
      margin-bottom: 10px;
    }

    #dataTable_filter input {
      width: 250px;
      padding: 8px;
      border-radius: 8px;
      border: 1px solid #ddd;
      margin-bottom: 20px;
    }

    /* Additional styling for the table headers */
    .table thead th {
      background-color: #f0f0f0;
      color: #2E3192;
      font-weight: 600;
    }

    /* Additional styling for the table rows */
    .table tbody td {
      color: #666666;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #f0f0f0;
    }

    .table thead th {
      background-color: #f0f0f0;
      color: #2E3192;
      font-weight: 600;
    }

    /* Additional styling for the table rows */
    .table tbody td {
      color: #666666;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #f0f0f0;
    }

    /* Styling for the "View More" link */
    .view-more-link {
      color: teal;
      font-size: 19px;
      text-decoration: none;
    }

    .view-more-link:hover {
      text-decoration: underline;
    }

    /* Styling for the "View More" link */
    .delete-link {
      color: red;
      text-decoration: none;
    }

    .delete-link:hover {
      color: orange;
      text-decoration: underline;
    }

    .summary {
      font-size: 14px;
      font-weight: 600;
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
          <a class="nav-link active" href="<?php echo base_url('home') ?>"><i class="fa fa-chart-bar"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="https://cdo.or.tz/"><i class="fa fa-globe"></i> CDO-Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="far fa-paper-plane"></i> Shared</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('login/activity') ?>"><i class="fa fa-link"></i>
            Activity</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('account/profile') ?>"><i class="far fa-user-circle"></i>
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
      <div class="col-md-3">
        <div class="sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/project/afyayangumaishayangu/') ?>"
                style="color:#FF5733"><b>AYMY-DASHBOARD</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/reached/school/') ?>"><i class="fas fa-users"></i> AYMY
                Clubs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/aymy/unasihi/') ?>"><i class="far fa-user"></i> Unasihi
                Teachers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-user"></i> Head Teachers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-user"></i> Secretaries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-user"></i> ChairPersons</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-file-alt"></i> File Shelf</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-file-alt"></i> Uploaded Docs</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('account/logout') ?>"><i class="far fa-address-card"></i>
                Sign-Out</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-9">
        <div class="user-profile">
          <h2 class="project-summary">Project : Summary</h2>
          <div class="profile-details">
            <div class="school-details">
              <h3>
                <?php //echo $school['school_name']; ?>
              </h3>

              <p class="summary"><strong>Schools Reached : </strong>
                <?php echo $school_reached ?>
              </p>

              <p class="summary"><strong>Wards Reached : </strong>
                <?php echo $wards_reached ?>
              </p>
              <p class="summary"><strong>Clubs Formed : </strong>
                <?php echo $school_reached + $wards_reached; ?>
              </p>
              <p class="summary"><strong>Students Reached : </strong>
                <?php echo $students_reached; ?>
              </p>
              <p class="summary"><strong>Young Women Reached : </strong>
                <?php echo $youngwomen_reached; ?>
              </p>
            </div>

          </div>
        </div><br>