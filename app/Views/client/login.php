<!DOCTYPE html>
<html>
<head>
    <title>CDO-DS Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        body {
        background: linear-gradient(to bottom right, #002984, #1BFFFF);
        font-family: 'Poppins', sans-serif;
        }   
    </style>
</head>
<body>
    <div class="container">
        <div class="row login-container">
            <div class="col-md-6">
                <div class="login-form">
                    <h4 class="login-title"><i class="fas fa-user-circle login-icon"></i> CDO-DS Authentification</h4>
                    <form id="account_login" onsubmit="accountLogin(event)">
                        <div class="mb-3">
                            <label for="email" class="form-label">Employee ID</label>
                            <input type="text" name="employee_id" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <div class="text-center">
                            <button type="submit" id="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none">Forgot Password..!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-logo">
                    <img src="/assets/images/logo.png" alt="Logo" width="200">
                </div>
                <div class="login-description">
                    <p>Dear CDO-Team!</p><br>
                    <p>Welcome to the Childhood Development Organization's Project Management System! This platform is your central hub for efficiently managing office projects. Here, you can seamlessly organize, track, and collaborate on projects, ensuring smooth workflows and successful outcomes.</p>
            </div>
            <div class="text-center mt-3">
                <p><a href="<?php echo site_url('register') ?>" class="text-decoration-none">I don't have an account!</a><p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include 'jsProcess/process.php' ?>
</body>
</html>


