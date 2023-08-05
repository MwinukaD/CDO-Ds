<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
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
        <div class="row registration-container">
        <div class="col-md-6">
                <div class="text-center">
                    <div class="registration-logo">
                        <img src="/assets/images/logo.png" alt="Logo" width="200">
                    </div>
                    <h3 class="mb-4">Welcome to CDO-DS</h3>
                    <p>OT-Kit is a professional software solution that empowers local NGOs, small firms, and individuals to streamline office material processing and writing tasks. It offers advanced tools for document management, collaboration, and writing assistance, enhancing productivity and efficiency.</p>
                    <p>With OT-Kit, users can optimize their office workflows and achieve professional results effortlessly.</p>
               </div>
               <div class="text-center mt-3">
                <a href="<?php echo site_url('/') ?>" class="text-decoration-none">Go to Login instead!</a>
            </div>
            </div>
        
            <div class="col-md-6">
                <div class="registration-form">
                    <h4 class="card-title text-center mb-4">CDO-DS New Account</h4>
                    <form id="cdo_ds_account" method="POST" action="#">
                        
                        <div class="mb-3">
                            <label for="organization" class="form-label ">Employee ID</label>
                            <input type="text" name="employee_no" class="form-control fullname" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Hint</label>
                            <input type="text" name="password_hint" class="form-control password1" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label ">Password</label>
                            <input type="password" name="password" class="form-control email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" name="password1" class="form-control password2" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary client-signup-button">Register</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php echo $this->include('layouts/footer') ?>
    <script>
     $(document).ready(function(){ });

       $('#cdo_ds_account').on('submit',(page_load_event)=>{
                page_load_event.preventDefault();
                
                let data = $("#cdo_ds_account").serialize();
                //AJAX method
                $.ajax({
                    "method": "POST",
                    "url":"<?=base_url('submit/account/data') ?>",
                    "data": data,
                    "dataType": 'JSON',
                    beforeSend(){
                        $(".client-signup-button").text("Processing...!");
                        $(".client-signup-button").attr('disabled','disabled');
                    },
                    "success":function(response){
                        $(".client-signup-button").text("Register");
                        $(".client-signup-button").attr('disabled',false);
                        if(response.accountExist){
                            Swal.fire({
                            position: 'middle',
                            icon: 'error',
                            text: response.accountExist,//Account already created
                            showConfirmButton: false,
                            timer: 1500
                            });

                        }else if(response.success){
                        Swal.fire({
                            position: 'middle',
                            icon: 'success',
                            text: response.success,//Account created successfully
                            showConfirmButton: false,
                            timer: 1500
                            });
                    }else if(response.idNotExist){
                        Swal.fire({
                            position: 'middle',
                            icon: 'error',
                            text: response.idNotExist,
                            showConfirmButton: false,//ID entered is not available in cdo employees list
                            timer: 1500
                            }); 
                    }else if(response.passwordMissMatch){
                        Swal.fire({
                            position: 'middle',
                            icon: 'error',
                            text: response.passwordMissMatch,
                            showConfirmButton: false,//password and confirm password field dont Match
                            timer: 1500
                            }); 
                    }
                },

                    "error":function(xhr, status, error){
                        Swal.fire({
                            position: 'middle',
                            icon: 'error',
                            text: error,
                            showConfirmButton: false,
                            timer: 1500
                            });
                    }
            });
            });
    </script>
</body>
</html>
