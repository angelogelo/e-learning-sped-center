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
        <div class="small-box bg-warning">
          <div class="inner">
            <?php  
              $disability = $connection->query("SELECT * FROM disability WHERE assign_teacher = '".$teacherRow['teacher_id']."'");
              $disabilityRow = $disability->fetch_array();
              $student = $connection->query("SELECT * FROM student WHERE disability = '".$disabilityRow['id']."'");
            ?>
            <h3><?php echo $student->num_rows; ?></h3>
            <p>No of My Students</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="student.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <?php  
              $module = $connection->query("SELECT * FROM module WHERE teacher_id = '$username'");
            ?>
            <h3><?php echo $module->num_rows; ?></h3>
            <p>No of My Modules</p>
          </div>
          <div class="icon">
            <i class="fas fa-file-word"></i>
          </div>
          <a href="module.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <?php  
              $video = $connection->query("SELECT * FROM video WHERE teacher_id = '$username'");
            ?>
            <h3><?php echo $video->num_rows; ?></h3>
            <p>No of My Video Presentation</p>
          </div>
          <div class="icon">
            <i class="fas fa-file-video"></i>
          </div>
          <a href="video-presentation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<?php include 'footer.php'; ?>
  