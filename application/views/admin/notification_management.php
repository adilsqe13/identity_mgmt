<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notification Management</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/jqvmap/jqvmap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css?v=3.2.0') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/default.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/dashboard/change-password') ?>" class="nav-link">Change Password</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('AdminLogin/logout') ?>" class="nav-link text-danger">Logout</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Identity Managment</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo 'Admin' ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user-management') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User Management
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <span class="nav-link active">
                                <i class="nav-icon fas fa-bell "></i>
                                <p style="font-size: 15px;">
                                    Notification Management
                                </p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/user-log-management') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-in-alt"></i>
                                <p>
                                    User Log Management
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/activity-management') ?>" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>

                                <p>
                                    Activity Management
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <span class="h3"><button class="btn m-0" onclick="goBack()"><i class="fas fa-arrow-left"></i></button></span>
                            <span class="m-0 h3">Notification Management</span>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-light card-outline">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">New Message</h3>
                        </div>
                        <form action="<?= base_url('Admin/NotificationManagement/send_email') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1 dfjeac bold"> TO: </div>
                                        <div class="col-11">
                                            <select class="select2" name="emails[]" multiple="multiple" data-placeholder="Recipients" style="width: 100%; " required>
                                                <?php
                                                foreach ($users as $row) {
                                                ?>
                                                    <option value="<?php echo $row->email ?>"><?php echo $row->f_name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1 dfjeac bold"> Subject: </div>
                                        <div class="col-11">
                                            <input class="form-control" name="subject" placeholder="subject" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                        <div class="col-1 dfjeas bold"> Message: </div>
                                        <div class="col-11">
                                        <textarea id="compose-textarea" class="form-control" name="msg_body" style="height: 250px" required placeholder="type here"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer mb-2">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-envelope"></i> Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2017-2024 <a href="#">Bitpastel.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('plugins/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('plugins/sparklines/sparkline.js') ?>"></script>
    <script src="<?= base_url('plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
    <script src="<?= base_url('plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
    <script src="<?= base_url('plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <script src="<?= base_url('plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <script src="<?= base_url('dist/js/adminlte.js') ?>"></script>
    <script src="<?= base_url('dist/js/pages/dashboard.js') ?>"></script>
    <script src="<?= base_url('plugins/select2/js/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('plugins/toastr/toastr.min.js') ?>"></script>
    <script src="<?= base_url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>"></script>
    <script src="<?= base_url('plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
    <script src="<?= base_url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script>
    <script src="<?= base_url('plugins/bs-stepper/js/bs-stepper.min.js') ?>"></script>
    <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(function() {
            <?php if ($this->session->flashdata('success')) : ?>
                Toast.fire({
                    icon: 'success',
                    title: '<?php echo $this->session->flashdata('success'); ?>'
                });
            <?php endif; ?>
        });
        $(function() {
            <?php if ($this->session->flashdata('error')) : ?>
                Toast.fire({
                    icon: 'error',
                    title: '<?php echo $this->session->flashdata('error'); ?>'
                });
            <?php endif; ?>
        });
    </script>


</body>

</html>