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

    .reached-title {
      font-size: 15px;
      font-weight: 600;
      color: #2E3192;
      margin-bottom: 1em;
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
  color: #2E3192;
  text-decoration: none;
}

.view-more-link:hover {
  text-decoration: underline;
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
              <a class="nav-link" href="<?php echo base_url('/project/afyayangumaishayangu/') ?>" style="color:#FF5733"><b>AYMY-DASHBOARD</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php #echo base_url('login/activity') ?>"><i class="fas fa-users"></i> AYMY Clubs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-user"></i> Unasihi Teachers</a>
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
              <a class="nav-link" href="<?php echo base_url('account/logout')?>"><i class="far fa-address-card"></i> Sign-Out</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="user-profile">
          <h3 class="reached-title">SECONDARY SCHOOLS WE HAVE REACHED</h3>
          <div class="profile-details">
          <table class="table table-bordered table-striped" id="dataTable">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Name Of School</th>
          <th>Location</th>      
          <th>Head Teacher</th>
          <th>Unasihi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
        
          <td>fdfdfdf</td>
          <td>sasasasas</td>
          
          <td>sfjfjdnf</td>
          <td>sfjfjdnf</td>
          <td><a href="<?php echo base_url('reached/school/') ?>" class="view-more-link"><i class="fas fa-info-circle"></i> More Info </a></td>
        </tr>

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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
      // Initialize DataTable with options
      $('#dataTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "lengthChange": false, // Disable showing entries
        "info": false, // Disable showing showing x to y of z entries
        "language": {
          "search": "",
          "searchPlaceholder": "Search...",
        },
      });

      // Style the search input
      $('#dataTable_filter input').addClass('form-control');
    });
  </script>
</html>
