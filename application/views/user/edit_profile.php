<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/jqvmap/jqvmap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css?v=3.2.0') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/default.css') ?>">
    <style>
        #fileInput {
            display: none;
        }
    </style>
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
                        <a href="#" class="d-block"><?php echo $this->session->userdata('f_name') ?></a>
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
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/profile') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/picture-dump')?>" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p style="font-size: 15px;">
                                    Photos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/task-manager')?>" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Task Manager
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/task-manager/archive-task') ?>" class="nav-link">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>
                                    Archived
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
                            <span class="h3"><button onclick="goBack()" class="btn m-0"><i class="fas fa-arrow-left"></i></button></span>
                            <span class="m-0 h3">Edit Profile</span>
                        </div><!-- /.col -->
                        <div class="col-sm-6 dfjeac">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container w-50">
                    <!-- <div class="row"> -->
                    <!-- <div class="col w-50"> -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <form action="<?= base_url('User/Edit_profile/edit_profile')?>" method="post" enctype="multipart/form-data">
                                <p class="dfjcac">
                                    <button id="uploadButton" class="bg-transparent border-0">
                                        <?php 
                                        if($user->p_image){
                                            ?>
                                            <img src='<?= base_url('uploads/' . $user->p_image)?>' class='rounded-3 mt-2' width='85px' height='88px'></img>
                                       <?php
                                        }else{
                                            ?>
                                            <i class="fas fa-user fa-6x"></i>
                                            <?php
                                        }
                                        ?>
                                    </button>
                                    <i class="fas fa-pen fa-lg"></i>
                                    <input id="fileInput" type="file" class="form-control" name="p_image" accept="image/*" />
                                </p>
                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col-4 dfjeac bold">NAME:</div>
                                        <div class="col-8 text-info dfjsac border-0 list-group-item"><input type="text" class="form-control" name="f_name" value="<?= $this->session->flashdata('f_name')? $this->session->flashdata('f_name'): $user->f_name ?>" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 dfjeac bold">EMAIL:</div>
                                        <div class="col-8 text-info dfjsac border-0 list-group-item"><input type="text" class="form-control" name="email" value="<?= $this->session->flashdata('email')? $this->session->flashdata('email'): $user->email ?>" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 dfjeac bold">MOBILE:</div>
                                        <div class="col-8 text-info dfjsac border-0 list-group-item"><input type="text" class="form-control" name="mobile" value="<?= $this->session->flashdata('mobile')? $this->session->flashdata('mobile'): $user->mobile ?>" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 dfjeac bold">DOB:</div>
                                        <div class="col-8 text-info dfjsac border-0 list-group-item"><input type="date" class="form-control" value="<?= $this->session->flashdata('dob')? $this->session->flashdata('dob'): $user->dob ?>" name="dob" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 dfjeac bold">ADDRESS:</div>
                                        <div class="col-8 text-info dfjsac border-0 list-group-item"><input type="text" class="form-control" name="address"  value="<?= $this->session->flashdata('address')? $this->session->flashdata('address'): $user->address ?>" required></input></div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-block mt-2">
                                    <div class="row">
                                        <div class="col dfjcac"><span style="font-size: 22px;" class="mx-1 bold">Update</span></div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
                <!-- /.content-wrapper -->
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2017-2024 <a href="#">Bitpastel.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
        <!-- ./wrapper -->

        <script>
            var baseUrl = "<?php echo base_url(); ?>";

            function confirmDelete($user_id) {
                if (confirm("Do you want to delete this user ?")) {
                    window.location.href = baseUrl + 'Admin/UserManagement/delete_user?id=' + $user_id;
                }
            }

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
        <script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
        <script src="<?= base_url('plugins/toastr/toastr.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
        <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('plugins/jszip/jszip.min.js') ?>"></script>
        <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
        <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
        <script src="<?= base_url('dist/js/adminlte.min.js?v=3.2.0') ?>"></script>

        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <!-- Toast -->
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $(function() {
                <?php if ($this->session->flashdata('update_user_success')) : ?>
                    Toast.fire({
                        icon: 'success',
                        title: '<h6><?php echo $this->session->flashdata('update_user_success'); ?></h6>'
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

        <script>
            //  Select Profile Picture Logic
            const uploadButton = document.getElementById('uploadButton');
            const fileInput = document.getElementById('fileInput');
            uploadButton.addEventListener('click', (event) => {
                event.preventDefault();
                fileInput.click();
            });
            fileInput.addEventListener('change', () => {
                const imagePreview = document.getElementById('imagePreview');
                const file = fileInput.files[0];
                if (fileInput.files.length > 0) {
                    const file_icon = document.getElementById('uploadButton');
                    // Display image preview
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        file_icon.innerHTML = `<img src='${e.target.result}' class='rounded-3 mt-2' width='85px' height='88px'></img>`
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
</body>

</html>