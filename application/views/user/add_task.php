<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>

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

         <!-- Add Task Modal -->
         <div class="overlay"></div>
        <div class="modal-dialog center-100 box" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="modal-title" id="addTaskModalLabel">Create a task</h3>
                        <a href="<?= base_url('dashboard/task-manager')?>"><i class="fas fa-times fa-lg p-2" style="color: black"></i></a>
                </div>
                <div class="modal-body">
                    <form action=<?php echo base_url("User/AddTask/add_task") ?> method="post">
                        <div class="mb-3">
                            <label class="form-label ">Task Name</label>
                            <input type="text" class="form-control"  name="task_name"  required />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label ">Description</label>
                            <textarea type="text" class="form-control" rows="3" name="description" required> </textarea>
                        </div>
                </div>
                <div class="modal-footer border-0">
                    <input type="submit" value="Add" style="width:17%" class="btn btn-md btn-danger"></input>
                </div>
                </form>
            </div>
        </div>
        <!-- End Add task modal -->

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
                            <a href="<?= base_url('dashboard/picture-dump') ?>" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p style="font-size: 15px;">
                                    Photos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/task-manager') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p style="font-size: 15px;">
                                    Task Manager
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
                            <span class="m-0 h3">Task Manager</span>
                        </div><!-- /.col -->
                        <div class="col-sm-6 dfjeac">
                            <a href="<?= base_url('dashboard/task-manager/add-task') ?>" class="btn btn-block btn-danger w-25">Add Task</a>
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
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Added Date</th>
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
                            foreach ($tasks as $task) {
                            ?>
                                <tr>
                                    <td><?= $task->id ?></td>
                                    <td><?= htmlspecialchars($task->task_name) ?></td>
                                    <td><?= htmlspecialchars($task->description) ?></td>
                                    <td>
                                    <?php
                                                $date = new DateTime("@$task->added_date");
                                                $date->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                                echo $date->format('d-F-Y');
                                                ?>
                                </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-5 dfjeac"><a href="<?= base_url('dashboard/task-manager/edit_task?task_id=' . $task->id) ?>" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-edit"></i></a></div>
                                            <div class="col-2 dfjcac"><button onclick='confirmDelete(<?php echo $task->id ?>)' class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button></div>
                                            <div class="col-5 p-0 dfjsac"><a href="<?= base_url('admin/user-management/user_profile?task_id=' . $task->id) ?>" class="btn btn-sm " title="Archive"><i class="fas fa-archive fa-2x" style="color: gray; padding:0px"></i></a></div>
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
</body>

</html>