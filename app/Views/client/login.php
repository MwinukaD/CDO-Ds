<!DOCTYPE html>
<html>
<head>
    <title>OT-Kit Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                    <form id="account_login">
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
                <p>At OT-Kit, we are committed to delivering the best quality and exceptional service to ensure your utmost satisfaction.</p>
                <p>Thank you for choosing OfficeToolKit and creating an account with us. We look forward to providing you with a seamless and productive office experience.</p>
            </div>
            <div class="text-center mt-3">
                <p><a href="<?php echo site_url('account/register') ?>" class="text-decoration-none">I don't have an account!</a><p>
                <a href="<?php echo site_url('home') ?>" class="text-decoration-none"><b>USE INSTEAD</b></a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function(){

            $("form#account_login").on('submit', function(e) {
            e.preventDefault();
        let formData = $("form#account_login").serialize();
        $.ajax({
            'url': "<?= base_url() ?>",
            'method':'POST',
            'data': formData,
            'dataType':'JSON',
            beforeSend(){
                $("#login").text("Processing...!");
                $("#login").attr('disabled','disabled');},
            'success':function(response){
                $("#login").text("Login");
                $("#login").attr('disabled',false);
                if(response.success){
                window.location.href="<?= base_url('home')?>";
                }else{
                    Swal.fire({
                    position: 'middle',
                    icon: 'error',
                    text: response.message,//Login failed, credentials not correct
                    showConfirmButton: false,
                    timer: 1500
                    });
                }
            },
            "error":function(xhr, status, error){
                Swal.fire({
                    position: 'middle',
                    icon: 'error',
                    text: error,//Login failed, Something is wrong
                    showConfirmButton: false,
                    timer: 1500
                    });
                $("#login").text("Login");
                $("#login").attr('disabled',false);
            }
        });
        });
    });
    </script>
</body>
</html>


