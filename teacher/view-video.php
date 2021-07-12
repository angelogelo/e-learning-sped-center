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
  
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModule"><i class="fas fa-plus-circle nav-icon"></i> | Add Video</button><br><br>

  <div class="container-fluid">
    <?php
        $video = $connection->query("SELECT * FROM video WHERE disability = '$id' ORDER BY created_at DESC");
        while ($videoRow = $video->fetch_array()) {
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
              <!-- Edit -->
              <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#editVideo<?php echo $videoRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>

              <!-- Delete -->
              <button type="button" class="btn btn-outline-danger btn-sm deleteVideo" data-id="<?php echo $videoRow['id']; ?>"><i class="fa fa-trash"></i></button>
                    <br><br>

              <div class="embed-responsive embed-responsive-16by9">
                <video controls>
                  <source src="../videos/<?php echo $updateVideo; ?>" type="video/mp4">
                </video>
              </div>
            </div>
        </div>

        <div class="modal fade" id="editVideo<?php echo $videoRow['id']; ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">
                  <i class="fas fa-info-circle"></i> Flash Card's Information
                </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <form action="" method="POST" class="editVideoForm" id="editVideoForm<?php echo $videoRow['id']; ?>" data-id="<?php echo $videoRow['id']; ?>" enctype="multipart/form-data">
                <div class="modal-body">
                
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Title</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                        </div>
                        <input type="text" class="form-control" name="edit_title" value="<?=$videoRow['title'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <p class="h6">Video Presentation</p>
                      <div class="custom-file">
                        <input type="file" name="file" id="file" class="custom-file-input form-control-sm" accept="video/*">
                        <label class="custom-file-label">Choose File</label>
                      </div>
                      <span>Current: <b><?= $videoRow['video']; ?></b></span>
                    </div>
                  </div>

                </div><!--modal-body-->
                <div class="modal-footer justify-content-between">
                  <input type="hidden" name="update_id" value="<?=$videoRow['id'];?>">
                  <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Update</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div><!--row-->
    <?php } ?>
  </div><!--container-->
</section>

<div class="modal fade" id="addModule">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> Video Presentation Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="addModuleForm">
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <div class="form-group">
              <label>Title</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                </div>
                <input type="text" class="form-control" name="title" required>
              </div>
            </div>
            <div class="form-group">
              <p class="h6">Video Presentation</p>
              <div class="custom-file">
                <input type="file" name="file" id="file" class="custom-file-input form-control-sm" accept="video/*" required>
                <label class="custom-file-label">Choose File</label>
              </div>
            </div>
          </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="teacher_id" value="<?php echo $username; ?>">
        </div><!--row-->
      </div><!--modal-body-->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Save</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include 'footer.php'; ?>

<script type="text/javascript">

  $(document).ready(function(){

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

    $(document).on('submit', '.editVideoForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editVideoForm'+id)[0]);

      $.ajax({
        url: "../includes/updateVideo.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update video information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Video has been successfully updated.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });

    $(document).on('click', '.deleteVideo', function() {
      var id = $(this).attr('data-id');
      swal({
        title: "Are you sure you want to delete this Video Presentation?",
        text: "PROCEED WITH CAUTION!!!",
        icon: "info",
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm"
        }
      }).then(function(event) {
        if (event == true) {
          $.ajax({
            url: "../includes/deleteVideo.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id
            }, success: function(data) {
              console.log(data);
              if (data === "Deleted") {
                swal({
                  title: "Video Presentation has been deleted!",
                  text: "You can't recover this deleted Video!",
                  icon: "info"
                }).then(function() {
                  location.reload();
                });
              } else {
                swal({
                  title: "Failed to delete this Video!",
                  icon: "info"
                });
              }
            }
          })
        }
      });
    });

  });

</script>