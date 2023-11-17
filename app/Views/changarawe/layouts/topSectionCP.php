<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDO-DS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/innerStyle.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CDO-DS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('home') ?>"><i class="fa fa-chart-bar"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://cdo.or.tz/"><i class="fa fa-globe"></i> CDO-Site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="far fa-paper-plane"></i> Shared</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('login/activity') ?>"><i
                                class="fa fa-link"></i>
                            Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('account/profile') ?>"><i
                                class="far fa-user-circle"></i>
                            Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('account/logout') ?>"><i
                                class="fas fa-sign-out-alt"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column" style="margin-top:4em;">
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#FF5733; font-size: 17px;"><b>
                        <?php
                        $session = session();
                        echo $session->get('employee_id'); ?>
                    </b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/reached/school/') ?>"> <i class="fas fa-users"></i> CP Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/aymy/unasihi-teachers/') ?>"><i class="far fa-user"></i>
                    Most-Sick Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/aymy/head-teachers/') ?>"><i class="fas fa-user"></i>
                    Most-Sick Bibi/Babu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/aymy/club-secretaries/') ?>"><i class="far fa-user"></i>
                    Feeding Program</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php// echo base_url('/aymy/club-chairpersons/') ?>"><i
                        class="fas fa-user"></i>
                    Class Levels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/cp-schools/') ?>"><i
                        class="fas fa-file-alt"></i> CP-Schools</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('account/logout') ?>"><i class="far fa-address-card"></i>
                    Sign-Out</a>
            </li>
        </ul>
    </div>