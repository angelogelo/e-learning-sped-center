<?php 

  include 'header.php';

  //$_SESSION['id'] = $connection->lastInsertId();

  //echo $timeToday;
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

      <div class="col-lg-6 col-6">
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
          <a href="student.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
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
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <a href="teacher.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
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
            <i class="fas fa-users"></i>
          </div>
          <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fa fa-eye" style="color: green;"></i> Online Users</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-footer bg-white p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <?php

                  $onlineUser = $connection->query("SELECT * FROM student");
                  while ($onlineUserRow = $onlineUser->fetch_array()) {
                  $lrn = $onlineUserRow['lrn'];

                  $select = $connection->query("SELECT * FROM login_details WHERE user_id='$lrn' ORDER BY last_activity DESC LIMIT 1");
                  $selectRow = $select->fetch_array();

                  $timeToday = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                  $onlineTime = date('Y-m-d H:i:s', $timeToday);

                  echo $onlineTime;

                  if ($selectRow > $onlineTime) {
                    $status = '<span class="float-right text-success"><i class="fas fa-eye text-sm"></i></span>';
                  }else{
                    $status = '<span class="float-right text-danger"><i class="fas fa-eye-slash text-sm"></i></span>';
                  }


                ?>
                <a class="nav-link">
                  <?=$onlineUserRow['fullname'];?>
                  <?=$status;?>

                </a>
                <?php
                 }
                ?>
              </li>
            </ul>
          </div><!-- /.footer -->
        </div><!-- /.card -->         
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<script>
  $(document).ready(function(){


  });
</script>



<?php include 'footer.php'; ?>
