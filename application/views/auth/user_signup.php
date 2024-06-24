<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css?v=3.2.0'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('dist/css/default.css'); ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <h2>Sign Up</h2>
            </div>
            <div class="card-body">
                <form action='<?php echo base_url("UserSignup/signup") ?>' method="post">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="f_name" value="<?= $this->session->flashdata('f_name') ?>" placeholder="Full Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" value="<?= $this->session->flashdata('email') ?>" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                     <!-- Error Msg Display -->
                     <?php if ($this->session->flashdata('email_error')) : ?>
                        <span style="color: red ; font-size: 14px;" align='left'><?php echo $this->session->flashdata('email_error'); ?></span>
                    <?php endif; ?>
                
                    <div class="input-group mt-3">
                        <input type="tel" class="form-control" name="mobile" pattern="[0-9]{10}" value="<?= $this->session->flashdata('mobile') ?>" placeholder="Mobile Number" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                     <!-- Error Msg Display -->
                     <?php if ($this->session->flashdata('mobile_error')) : ?>
                        <hspan style="color: red ; font-size: 14px;" align='left'><?php echo $this->session->flashdata('mobile_error'); ?></hspan>
                    <?php endif; ?>

                    <div class="row mt-5">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-danger btn-block">Sign Up</button>
                        </div>
                    </div>
                </form>

                <div class="mt-4" align="center">
                    <a style="font-size: 15px ;" class="underline" href="<?= base_url('UserLogin') ?>">Login</a> <span>|</span>
                    <a style="font-size: 15px ;" class="underline" href="<?= base_url('AdminLogin') ?>">Admin Login</a>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('dist/js/adminlte.min.js?v=3.2.0') ?>"></script>
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('plugins/toastr/toastr.min.js') ?>"></script>
    <!-- Toast -->
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $(function() {
            <?php if ($this->session->flashdata('signup_error')) : ?>
                Toast.fire({
                    icon: 'error',
                    title: '<h5><?php echo $this->session->flashdata('signup_error'); ?></h5>'
                });
            <?php endif; ?>
        });

        $(function() {
            <?php if ($this->session->flashdata('error')) : ?>
                Toast.fire({
                    icon: 'error',
                    title: '<h5><?php echo $this->session->flashdata('error'); ?></h5>'
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>