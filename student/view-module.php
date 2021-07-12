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
        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModule"><i class="fas fa-plus-circle nav-icon"></i> | Add Module</button> --><br><br>
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <div class="card-body">
            <table id="studenTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Title</th>
                <th>File</th>
                <th>Uploader</th>
                <th>Date Created</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $module = $connection->query("SELECT * FROM module WHERE disability = '$id'");
                  $number = 1;
                  while ($moduleRow = $module->fetch_array()) {

                  $teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '".$moduleRow['teacher_id']."'");
                  $teacherRow = $teacher->fetch_array();
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$moduleRow['title'];?></td>
                  <td><?=$moduleRow['file'];?></td>
                  <td><?=$teacherRow['fullname'];?></td>
                  <td><?php echo date('M d, Y', strtotime($moduleRow['created_at'])); ?></td>
                  <td>
                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm view-module-data" data-toggle="tooltip" data-placement="top" data-id="<?php echo $moduleRow['id']; ?>"><i class="fa fa-eye"></i></button>
                  </td>
                </tr>
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

    $('#studenTable').DataTable({
      sorting: false,
      responsive: true
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

    $(document).on('click', '.view-module-data', function(){
      var id = $(this).attr('data-id');

      window.location.href = 'view-module-data.php?id='+id;
    });

  });

</script>