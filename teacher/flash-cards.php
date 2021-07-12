<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-clone"></i> Flash Cards</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Flash Cards</li>
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addFlashTitle"><i class="fas fa-plus-circle nav-icon"></i> | Add FLash Card Title</button><br><br>
        <div class="card card-primary card-outline">          
          <div class="card-body">
            <table id="flashCardTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Title</th>
                <th>Uploader</th>
                <th>Date Created</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $flash = $connection->query("SELECT * FROM flash_cards_title");
                  $number = 1;
                  while ($flashRow = $flash->fetch_array()) {
                  $teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '".$flashRow['teacher_id']."'");
                  $teacherRow = $teacher->fetch_array();
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$flashRow['title'];?></td>
                  <td><?=$teacherRow['fullname'];?></td>
                  <td><?php echo date('M d, Y', strtotime($flashRow['created_at'])); ?></td>
                  <td>
                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm view-flash-cards" data-toggle="tooltip" data-placement="top" data-id="<?php echo $flashRow['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Edit -->
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editTitle<?php echo $flashRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>

                    <!-- Delete -->
                    <button type="button" class="btn btn-outline-danger btn-sm deleteModule" data-id="<?php echo $flashRow['id']; ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>

                <div class="modal fade" id="editTitle<?php echo $flashRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> Module Title Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="" method="POST" class="editTitleForm" id="editTitleForm<?php echo $flashRow['id']; ?>" data-id="<?php echo $flashRow['id']; ?>" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Title</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                              </div>
                              <input type="text" class="form-control" name="edit_title" value="<?= $flashRow['title']; ?>" required>
                            </div>
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer justify-content-between">
                        <input type="hidden" name="update_id" value="<?=$flashRow['id'];?>">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Update</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->


<div class="modal fade" id="addFlashTitle">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> Flash Card Title Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="addFlashTitleForm">
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
          </div>
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

    $('#flashCardTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.view-flash-cards', function(){
      var id = $(this).attr('data-id');

      window.location.href = 'view-flash-cards.php?id='+id;
    });

    $('#addFlashTitleForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addFlashTitle.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          //console.log(data);
          if (data == "Taken") {
            swal({
              title: "Title already exist.",
              icon: "warning"
            });

          }else if (data == "Failed") {
            swal({
              title: "Failed to add new title. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New flash cards title has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $(document).on('submit', '.editTitleForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editTitleForm'+id)[0]);

      $.ajax({
        url: "../includes/updateTitle.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update flash card title information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Flash Card Title has been successfully updated.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $(document).on('click', '.deleteModule', function() {
      var id = $(this).attr('data-id');
      swal({
        title: "Are you sure you want to delete this Title?",
        text: "PROCEED WITH CAUTION!!!",
        icon: "info",
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm"
        }
      }).then(function(event) {
        if (event == true) {
          $.ajax({
            url: "../includes/deleteFlashTitle.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id
            }, success: function(data) {
              console.log(data);
              if (data === "Deleted") {
                swal({
                  title: "Title has been deleted!",
                  text: "You can't recover this deleted Title!",
                  icon: "info"
                }).then(function() {
                  location.reload();
                });
              } else {
                swal({
                  title: "Failed to delete this Title!",
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