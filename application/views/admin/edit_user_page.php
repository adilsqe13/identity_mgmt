<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>

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
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .box {
            position: relative;
            z-index: 2;
            background: transparent;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .center-100 {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 32%;
            z-index: 100;
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

        <!-- Edit User Modal -->
        <div class="overlay"></div>
        <div class="modal-dialog center-100 box" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="modal-title" id="editUserModalLabel">Edit user</h3>
                    <a href="<?= base_url('Admin/UserManagement') ?>"><i class="fas fa-times fa-lg p-2" style="color: black"></i></a>
                </div>
                <div class="modal-body">
                    <form action=<?php echo base_url("Admin/EditUser/edit_user") ?> method="post" enctype="multipart/form-data">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo isset($user->id) ? htmlspecialchars($user->id) :  htmlspecialchars($this->session->flashdata('id')) ?>"></input>
                        <div class="mb-3">
                            <label for="name" class="form-label ">Name</label>
                            <input type="text" class="form-control" name="f_name" value='<?php echo isset($user->f_name) ? htmlspecialchars($user->f_name) :  htmlspecialchars($this->session->flashdata('f_name')) ?>' required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label ">Email</label>
                            <input type="email" class="form-control" name="email" value='<?php echo isset($user->email) ? htmlspecialchars($user->email) :  htmlspecialchars($this->session->flashdata('email')) ?>' required />
                            <!-- Error Msg Display -->
                            <?php if ($this->session->flashdata('email_error')) : ?>
                                <h5 style="color: red ; font-size: 14px;" class="fs-6" align='left'><?php echo $this->session->flashdata('email_error'); ?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label ">Mobile</label>
                            <input type="tel" class="form-control" pattern="[0-9]{10}" name="mobile" value='<?php echo isset($user->mobile) ? $user->mobile :  $this->session->flashdata('mobile') ?>' required />
                            <!-- Error Msg Display -->
                            <?php if ($this->session->flashdata('mobile_error')) : ?>
                                <h5 style="color: red ; font-size: 14px;" class="fs-6" align='left'><?php echo $this->session->flashdata('mobile_error'); ?></h5>
                            <?php endif; ?>
                        </div>
                </div>
                <div class="modal-footer border-0">
                    <input type="submit" name="add_user" value="Save" style="width:17%" class="btn btn-md btn-info"></input>
                </div>
                </form>
            </div>
        </div>
        <!-- End Add user modal -->


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
                        <li class="nav-item menu-open">
                            <span class="nav-link active">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User Managment
                                </p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/notification-management') ?>" class="nav-link">
                                <i class="nav-icon fas fa-bell "></i>
                                <p style="font-size: 15px;">
                                    Notification Management
                                </p>
                            </a>
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
                            <h1 class="m-0">User Management</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 dfjeac">
                            <button class="btn btn-block btn-warning w-25">Add User</button>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>
                                    <div class="row">
                                        <div class="col dfjcac">
                                            Status
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="row">
                                        <div class="col dfjcac">
                                            Action
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $user) {
                            ?>
                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= $user->f_name ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->mobile ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <?php
                                                if ($user->status) {
                                                    echo '<span class="text-success bold">Active</span>';
                                                } else {
                                                    echo '<span class="text-danger bold">Inactive</span>';
                                                }
                                                ?>
                                            </div>
                                            <div class="col-6 dfjeac">
                                                <?php
                                                if ($user->status) {
                                                ?>
                                                    <a href="<?= base_url('Admin/UserManagement/active_toggle?id=' . $user->id) ?>">
                                                        <i class="fas fa-toggle-on fa-lg" style="color: black"></i>
                                                    </a>

                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= base_url('Admin/UserManagement/active_toggle?id=' . $user->id) ?>">
                                                        <i class="fas fa-toggle-off fa-lg" style="color: black"></i>
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                                </i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-5 dfjeac"><button class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button></div>
                                            <div class="col-2 dfjsac"><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></div>
                                            <div class="col-5 p-0 dfjsac"><a href="<?= base_url('admin/user-management/user_profile?user_id=' . $user->id) ?>" class="btn btn-sm " title="View"><i class="fas fa-eye fa-2x" style="color: gray; padding:0px"></i></a></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
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

    <script>
        $(function() {
            <?php if ($this->session->flashdata('add_user_error')) : ?>
                Toast.fire({
                    icon: 'error',
                    title: '<?php echo $this->session->flashdata('add_user_error'); ?>'
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>