<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">



    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/bs-stepper/css/bs-stepper.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/dropzone/min/dropzone.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css?v=3.2.0') ?>">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar (TopBar) -->
        <?= $this->include('template/topbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container (SideBar)-->
        <?= $this->include('template/sidebar'); ?>
        <!-- Main Sidebar Container (SideBar)-->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?= $this->renderSection('page-content'); ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- FOOTER -->
        <footer class="main-footer">
            <div class="copyright text-center my-auto">
                <span>&copy;<?= date('Y'); ?> Electronic City Indonesia. All Rights Reserved </span>
            </div>
        </footer>
        <!-- FOOTER -->

        <!-- ------------------------------------------------------- -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- ------------------------------------------------------- -->

        <script src="<?php echo base_url('plugins/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/select2/js/select2.full.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/moment/moment.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
        <script src="<?php echo base_url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/bs-stepper/js/bs-stepper.min.js') ?>"></script>
        <script src="<?php echo base_url('plugins/dropzone/min/dropzone.min.js') ?>"></script>
        <script src="<?php echo base_url('dist/js/adminlte.js?v=3.2.0') ?>"></script>
        <script src="<?php echo base_url('dist/js/demo.js') ?>"></script>
        <script src="<?php echo base_url('js/global.js') ?>"></script>
        <script src="<?php echo base_url('js/form_tender.js') ?>"></script>

        <script>
            $(function() {

                //Date picker

                var loginDate = "<?= session()->get('login_date') ?>";

                if (loginDate) {
                    $('#tgl_pengajuan').val(loginDate);
                } else {
                    $('#tgl_pengajuan').datetimepicker({
                        format: 'L'
                    });
                }
                //Date and time picker
                $('#tgl_diperlukan').datetimepicker({
                    format: 'L'
                });

                $('#tgl_aktif').datetimepicker({
                    format: 'L'
                });

                // $('#tglAktifBaru').daterangepicker();
                // $('#tglAktifLama').daterangepicker();

            });
        </script>

</body>