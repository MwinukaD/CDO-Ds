<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <style>
  body {
    background: linear-gradient(to bottom right, #002984, #1BFFFF);
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
    font-size: 14px; /* Adjusted font size */
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

  .user-profile .profile-name {
    font-size: 15px; /* Adjusted font size */
    font-weight: 600;
    color: #2E3192;
    text-align: center;
  }

  .user-profile .profile-details {
    margin-bottom: 20px;
  }

  .user-profile .profile-details p {
    font-size: 12px; /* Adjusted font size */
    color: #666666;
    margin-bottom: 5px;
  }

  .user-profile .profile-details .label {
    font-weight: 600;
    color: #2E3192;
  }

  .user-profile .profile-details form {
    margin-top: 10px;
  }

  .user-profile .profile-details .form-group {
    margin-bottom: 10px;
  }

  .user-profile .profile-details .form-group label {
    font-weight: bold;
  }

  .user-profile .profile-details .form-group input {
    width: 100%;
    padding: 5px;
    font-size: 12px; /* Adjusted font size */
  }

  .user-profile .profile-details table {
    width: 100%;
    border-collapse: collapse;
  }

  .user-profile .profile-details td {
    padding: 8px;
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
    font-size: 14px; /* Adjusted font size */
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
    font-size: 16px; /* Adjusted font size */
    font-weight: 600;
    color: #2E3192;
    margin-bottom: 10px;
  }

  .content .panel-description {
    font-size: 14px; /* Adjusted font size */
    color: #666666;
    margin-bottom: 10px;
  }
  .label{
    font-size: 13px; /* Adjusted font size */
  }

  .content .panel-actions {
    margin-top: 20px;
  }

  .content .panel-actions .btn {
    margin-right: 10px;
  }
</style>

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="<?php echo base_url('home') ?>">CDO-Ds</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link active" href="<?php echo base_url('login/activity') ?>"><i class="fa fa-link"></i> Activity</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('account/profile') ?>"><i class="far fa-user-circle"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url('account/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
              <a class="nav-link" href="<?php echo base_url('account/profile') ?>"><i class="far fa-user-circle"></i> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('login/activity') ?>"><i class="far fa-calendar-alt"></i> Login Activity</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-envelope"></i> My Roles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notification</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('account/logout') ?>"><i class="fa fa-sign-out"></i> Sign-Out</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="user-profile">
        <?php foreach($account_data as $row): ?>
          <h2 class="profile-name"><?php echo $row['firstname'].' '.$row['lastname'] ?></h2>
          <img class="profile-pic" src="https://cdn.britannica.com/99/236599-050-1199AD2C/Mark-Zuckerberg-2019.jpg" alt="Profile Picture">
          <div class="profile-details">
            <form id="#profile_update_form" >
            
              <div class="form-group">
                <label class="label">Employee ID:</label>
                <input class="form-control edit-input" name="employee_id" type="text" value="<?php echo $row['employee_id_no'] ?>">
              </div>
              <div class="form-group">
                <label class="label">First Name:</label>
                <input class="form-control edit-input" name="firstname" type="text" value="<?php echo $row['firstname'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Middle Name:</label>
                <input class="form-control edit-input" name="middlename" type="text" value="<?php echo $row['middlename'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Last Name:</label>
                <input class="form-control edit-input" name="lastname" type="text" value="<?php echo $row['lastname'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Phone:</label>
                <input class="form-control edit-input" name="phone" type="text" value="<?php echo $row['phone_no'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Email:</label>
                <input class="form-control edit-input" name="email" type="text" value="<?php echo $row['email'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Date of Birth:</label>
                <input class="form-control edit-input" name="birth_date" type="text" value="<?php echo $row['birth'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Start Date:</label>
                <input class="form-control edit-input" name="start_date" type="text" value="<?php echo $row['start_date'] ?>">
              </div>
              <div class="form-group">
                <label class="label">Status:</label>
                <input class="form-control edit-input" name="status" type="text" value="<?php echo $row['status'] ?>">
              </div>
              <?php endforeach ?>
              <button id="save_changes" type="submit" class="btn btn-primary btn-rounded">Save Changes</button>
            </form>

          </div>
          
        </div>
      </div>
    </div>
  </div><br>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
  

</body>
</html>
