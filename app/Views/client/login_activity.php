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

    .user-profile .profile-name {
      font-size: 20px;
      font-weight: 600;
      color: #2E3192;
      text-align: center;
    }

    .user-profile .profile-details {
      margin-bottom: 20px;
    }

    .user-profile .profile-details p {
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
              <a class="nav-link" href="<?php echo base_url('account/logout')?>"><i class="far fa-address-card"></i> Sign-Out</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="user-profile">
          <h2 class="profile-name">John Doe</h2>
          <img class="profile-pic" src="https://cdn.britannica.com/99/236599-050-1199AD2C/Mark-Zuckerberg-2019.jpg" alt="Profile Picture">
          <div class="profile-details">
            <table>
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>UID</th>
                  <th>Login Time</th>
                  <th>Logout Time</th>
                  <th>Agent</th>
                  <th>IP Address</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 1;
                foreach($login_activity_data as $row): ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['uniid'] ?></td>
                  <td><?php echo $row['login_time'] ?></td>
                  <td><?php echo $row['logout_time'] ?></td>
                  <td><?php echo $row['agent'] ?></td>
                  <td><?php echo $row['ip_address'] ?></td>
                </tr>
               <?php 
               $i++;
               endforeach ?>
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><br>

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
