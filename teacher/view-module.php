<?php 

  include 'header.php'; 
  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $module = $connection->query("SELECT * FROM module WHERE id = '$id'");

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


<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModule"><i class="fas fa-plus-circle nav-icon"></i> | Add Module</button><br><br>
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <div class="card-body">
            <table id="viewModuleTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Title</th>
                <th>File</th>
                <th>Student Who View</th>
                <th>Date Created</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $module = $connection->query("SELECT * FROM module WHERE disability = '$id'");
                  $number = 1;
                  while ($moduleRow = $module->fetch_array()) {
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$moduleRow['title'];?></td>
                  <td><?=$moduleRow['file'];?></td>
                  <td><?=$moduleRow['view'];?></td>
                  <td><?php echo diffForHumans($moduleRow['created_at']); ?></td>
                  <td>

                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm view-module-data" data-toggle="tooltip" data-placement="top" data-id="<?php echo $moduleRow['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Edit -->
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editModule<?php echo $moduleRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>

                    <!-- Delete -->
                    <button type="button" class="btn btn-outline-danger btn-sm deleteModule" data-id="<?php echo $moduleRow['id']; ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>

                <div class="modal fade" id="editModule<?php echo $moduleRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> Module Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="" method="POST" class="editModuleForm" id="editModuleForm<?php echo $moduleRow['id']; ?>" data-id="<?php echo $moduleRow['id']; ?>" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Title</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                </div>
                                <input type="text" class="form-control" name="edit_title" value="<?= $moduleRow['title']; ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <p class="h6">Module (Microsoft Word)</p>
                              <div class="custom-file">
                                <input type="file" name="file" id="file" class="custom-file-input form-control-sm" accept="file">
                                <label class="custom-file-label">Choose File</label>
                                <span>Current: <b><?= $moduleRow['file']; ?></b></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer justify-content-between">
                        <input type="hidden" name="update_id" value="<?=$moduleRow['id'];?>">
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

<div class="modal fade" id="addModule">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> Module's Information
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
              <p class="h6">Module (Microsoft Word)</p>
              <div class="custom-file">
                <input type="file" name="file" id="file" class="custom-file-input form-control-sm" accept="file" required>
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

    $('#viewModuleTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.view-module', function(){
      var id = $(this).attr('data-id');

      window.location.href = 'view-module.php?id='+id;
    });

    $('#addModuleForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addModule.php",
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
              title: "Failed to add new staff. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New module has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });

    $(document).on('submit', '.editModuleForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editModuleForm'+id)[0]);

      $.ajax({
        url: "../includes/updateModule.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update module information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Module has been successfully updated.",
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
        title: "Are you sure you want to delete this Module?",
        text: "PROCEED WITH CAUTION!!!",
        icon: "info",
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm"
        }
      }).then(function(event) {
        if (event == true) {
          $.ajax({
            url: "../includes/deleteModule.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id
            }, success: function(data) {
              console.log(data);
              if (data === "Deleted") {
                swal({
                  title: "Module has been deleted!",
                  text: "You can't recover this deleted Module!",
                  icon: "info"
                }).then(function() {
                  location.reload();
                });
              } else {
                swal({
                  title: "Failed to delete this Module!",
                  icon: "info"
                });
              }
            }
          })
        }
      });
    });

    $(document).on('click', '.view-module-data', function(){
      var id = $(this).attr('data-id');

      window.location.href = 'view-module-data.php?id='+id;
    });

  });

</script>