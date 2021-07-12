<?php 

  include 'header.php';

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <?php  
              $student = $connection->query("SELECT * FROM student WHERE status LIKE '%Activated%'");
            ?>
            <h3><?php echo $student->num_rows; ?></h3>

            <p>No of Students</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <?php  
              $teacher = $connection->query("SELECT * FROM teacher WHERE status LIKE '%Activated%'");
            ?>
            <h3><?php echo $teacher->num_rows; ?></h3>

            <p>No of Teacher</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="teacher.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <?php  
              $user = $connection->query("SELECT * FROM user WHERE status LIKE '%Approved%'");
            ?>
            <h3><?php echo $user->num_rows; ?></h3>

            <p>No of Users</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<?php include 'footer.php'; ?>
