<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css?v=3.2.0')?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a>Forgot Password</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                <form action="<?= base_url('User/ForgotPassword/send_reset_pass_mail')?>" method="post">
                    <div class="input-group mt-3">
                        <input type="email" class="form-control" name="email" value="<?php echo $this->session->flashdata('email')?>" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Error Msg Display -->
                    <?php if ($this->session->flashdata('invalid_email')) : ?>
                                   <span style="color: red ; font-size: 13px;" align='left'><?php echo $this->session->flashdata('invalid_email'); ?></span>
                               <?php endif; ?>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request reset password</button>
                        </div>
                    </div>
                </form>
                
                <div class="mt-4" align="center">
                <a style="font-size: 15px ;" class="underline" href="<?= base_url('signup')?>">Signup</a>  <span>|</span>
                <a style="font-size: 15px ;" class="underline" href="<?= base_url('login')?>">Login</a>
                </div>
            </div>

        </div>
    </div>


    <script src="<?= base_url('plugins/jquery/jquery.min.js')?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= base_url('dist/js/adminlte.min.js?v=3.2.0')?>"></script>
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
            <?php if ($this->session->flashdata('reset_pass_success')) : ?>
                Toast.fire({
                    icon: 'success',
                    title: '<h5><?php echo $this->session->flashdata('reset_pass_success'); ?></h5>'
                });
            <?php endif; ?>
        });
        </script>
</body>

</html>