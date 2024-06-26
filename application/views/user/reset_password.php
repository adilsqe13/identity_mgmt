<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css?v=3.2.0') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a>Reset Password</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <!-- <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p> -->
                <form action="<?= base_url('User/ResetPassword/reset_password') ?>" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $this->input->get('user_id') ?>">
                    <div class="input-group mt-3">
                        <input id="pass1" type="password" class="form-control" name="password-1" value="<?php echo $this->session->flashdata('password-1') ?>" placeholder="New Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Error Msg Display -->
                    <?php if ($this->session->flashdata('password_count_error')) : ?>
                        <span style="color: red ; font-size: 13px;" align='left'><?php echo $this->session->flashdata('password_count_error'); ?></span>
                    <?php endif; ?>

                    <div class="input-group mt-3">
                        <input id="pass2" type="password" class="form-control" name="password-2" placeholder="Confirm New Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Error Msg Display -->
                    <?php if ($this->session->flashdata('password_mismatch')) : ?>
                        <span style="color: red ; font-size: 13px;" align='left'><?php echo $this->session->flashdata('password_mismatch'); ?></span>
                    <?php endif; ?>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button id="submit_btn" type="submit" class="btn btn-danger btn-block">Update</button>
                        </div>
                    </div>
                </form>

                <div class="mt-4" align="center">
                    <a style="font-size: 15px ;" class="underline" href="<?= base_url('signup') ?>">Signup</a> <span>|</span>
                    <a style="font-size: 15px ;" class="underline" href="<?= base_url('login') ?>">Login</a>
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
            <?php if ($this->session->flashdata('reset_pass_success')) : ?>
                Toast.fire({
                    icon: 'success',
                    title: '<h5><?php echo $this->session->flashdata('reset_pass_success'); ?></h5>'
                });
            <?php endif; ?>
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pass1Field = document.getElementById('pass1');
            const pass2Field = document.getElementById('pass2');
            const submitBtn = document.getElementById('submit_btn'); // Assuming the submit button has the ID 'submit_btn'

            function checkPasswords() {
                const pass1 = pass1Field.value;
                const pass2 = pass2Field.value;
                submitBtn.disabled = (pass1 !== pass2);
            }

            pass1Field.addEventListener('input', checkPasswords);
            pass2Field.addEventListener('input', checkPasswords);
        });
    </script>
</body>

</html>