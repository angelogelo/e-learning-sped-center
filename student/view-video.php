<?php 

  include 'header.php'; 
  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $video = $connection->query("SELECT * FROM video WHERE id = '$id'");

  $disability = $connection->query("SELECT * FROM disability WHERE id='$id'");
  $disabilityRow = $disability->fetch_array();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-user-nurse"></i> <?=$disabilityRow['description'];?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content-header -->


<section class="content">
<br><br>

  <div class="container-fluid">
    <?php
        $video = $connection->query("SELECT * FROM video WHERE disability = '$id'");
        while ($videoRow = $video->fetch_array()) {
        $teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '".$videoRow['teacher_id']."'");
        $teacherRow = $teacher->fetch_array();
        $updateVideo = $videoRow['video'];
    ?>
    <div class="row">
      
      <div class="col-md-12">
        <div class="timeline">
          <!-- timeline-->
        <div>
      </div><!--col-->

      <div class="time-label">
        <span class="bg-green"><?= date('M d, Y', strtotime($videoRow['created_at'])); ?></span>
      </div>

      <div>
      <i class="fas fa-video bg-maroon"></i>
        <div class="timeline-item">
          <span class="time"><i class="fas fa-clock"></i> <?php echo diffForHumansOnline($videoRow['created_at']); ?></span>
          <h3 class="timeline-header"><a href="#"><?= $teacherRow['fullname']; ?></a> Upload a video</h3>
            <div class="timeline-body">
              <div class="embed-responsive embed-responsive-16by9">
                <video controls>
                  <source src="../videos/<?php echo $updateVideo; ?>" type="video/mp4">
                </video>
              </div>
            </div>
        </div>
      
    </div><!--row-->
    <?php } ?>
  </div><!--container-->
</section>

<?php include 'footer.php'; ?>

<script type="text/javascript">

  $(document).ready(function(){

    $('#studenTable').DataTable({
      sorting: false,
      responsive: true
    });

    $('#addModuleForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addVideo.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          console.log(data);
          if (data == "Taken") {
            swal({
              title: "Title already exist.",
              icon: "warning"
            });

          }else if (data == "Failed") {
            swal({
              title: "Failed to add new staff. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New video has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });

  });

</script>