<?php

  include'../includes/connection.php';
  if (isset($_SESSION['teacher'])) {
    $username = $_SESSION['teacher'];

    $teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id='$username'");
    $teacherRow = $teacher->fetch_array();

    $emp_type = "teacher";
  }else {
    echo '<script>window.location.href="../index.php";</script>';
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>NRES - SPED</title>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icon -->
  <link rel="icon" href="../images/spedLogo.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <style>
    
    th{
      text-align: center;
    }

    td{
      text-align: center;
    }

  </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-indent" style="transform: rotate(180deg); color: black;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link">Home</a> -->
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <?php
            if ($teacherRow['picture'] == "none" || $teacherRow['picture'] == NULL) {
              ?>
                <img src="../images/no_image.png" class="user-image img-circle elevation-2" alt="User Image">
              <?php
            }else{
              ?>
                <img src="../images/teacher/<?php echo $teacherRow['picture']; ?>" class="user-image img-circle elevation-2" alt="User Image">
              <?php
            }
          ?>
          <span class="d-none d-md-inline"><?= $teacherRow['fullname']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat float-right" data-toggle="modal" data-target="#logoutModal">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-gradient-danger text-white">
          <h5 class="modal-title"><i class="fa fa-info-circle"></i> Message</h5>
        </div>
        <div class="modal-body py-3">
          <div class="py-3">
            <p class="h6">Are you sure you want to logout?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          <button type="button" class="btn btn-danger btn-sm" id="logoutButton" data-type="<?php echo $emp_type; ?>"><i class="fa fa-sign-out-alt"></i> Logout</button>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color: #b2bdb5;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../images/spedLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: black;"><b>Management</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index.php" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="student.php" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-user"></i>
                <p>Student</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="module.php" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-file"></i>
                <p>Module</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="video-presentation.php" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-video"></i>
                <p>Video Presentation</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="flash-cards.php" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-clone"></i>
                <p>Flash Cards</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logs.php" class="nav-link" style="color: black;">
              <i class="nav-icon fas fa-list"></i>
                <p>Activity Log</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" role="button" data-slide="true" data-widget="control-sidebar" style="color: black;">
              <i class="nav-icon fas fa-eye"></i>
                <p>See who's online?</p>
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