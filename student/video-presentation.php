<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-video"></i> Video Presentation</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Video Presentation</li>
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
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Select Student Disability</h3>
          </div>
          
          <div class="card-body">
            <div class="row">
              <?php 
                $disability = $connection->query("SELECT * FROM disability WHERE id='$disability'");
                while ($disabilityRow = $disability->fetch_array()) {
                $video = $disabilityRow['id'];
                $count = $connection->query("SELECT * FROM video WHERE disability = '$video'");
              ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <a data-id="<?php echo $disabilityRow['id']; ?>" class="info-box-icon bg-primary view-video"><i class="fas fa-user-nurse"></i></a>

                    <div class="info-box-content">
                      <span class="info-box-text"><b><?=$disabilityRow['description'];?></b></span>
                      <span class="info-box-text">Count: <?=$count->num_rows;?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->


<!-- <button data-tooltip="tooltip" title="Click to View Resources" class="btn btn-outline-success btn-sm viewTitle" data-toggle="tooltip" data-placement="top" data-id="<?php //echo $row['id']; ?>"><i class="fa fa-eye"></i> </button> -->


<?php include 'footer.php'; ?>

<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click', '.view-video', function(){
      var id = $(this).attr('data-id');

      window.location.href = 'view-video.php?id='+id;
    });

  });

</script>