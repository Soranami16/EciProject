<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <div class="info">
              <a href="#" class="d-block"><?= $name ?></a>
            </div>

          </div>
        </div>

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

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="<?php echo base_url() . 'dashboard'; ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item menu">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Store</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Store Location</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Tender</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Article</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Prefix</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Terminal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master EDC</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>
                  Tiket
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Create Tiket
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url() . 'formfasilitas'; ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Form fasilitas IT
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url() . 'formtender'; ?>" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Form Tender</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() . 'listtiket'; ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Tiket</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() . 'logout'; ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>

      </div>

    </aside>