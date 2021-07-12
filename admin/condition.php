<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-user-nurse"></i> Condition</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Condition</li>
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addDisability"><i class="fas fa-plus-circle nav-icon"></i> | Add Condition</button><br><br>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <table id="disabilityTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Type of Condition</th>
                <th>Students Count</th>
                <th>Assign Teacher</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $disability = $connection->query("SELECT * FROM disability");
                  $number = 1;
                  while ($disabilityRow = $disability->fetch_array()) {
                  
                  $teacher_id = $disabilityRow['assign_teacher'];
                  $teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '$teacher_id'");
                  $teacherRow = $teacher->fetch_array();

                  $select = $connection->query("SELECT * FROM student WHERE disability = '".$disabilityRow['id']."'");

                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$disabilityRow['description'];?></td>
                  <td><?= $select->num_rows; ?></td>
                  <td>
                    <?php  
                        if ($disabilityRow['assign_teacher'] == "none" || $disabilityRow['assign_teacher'] == NULL) {
                          ?>
                            <p>No Assigned Teacher</p>
                          <?php
                        }else {
                          ?>
                            <?=$teacher_name = $teacherRow['fullname'];?>
                          <?php
                        }
                      ?>
                  </td>
                  <td>

                    <!-- Asssign Teacher -->
                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#assignTeacher<?php echo $disabilityRow['id']; ?>"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Click to Asssign"></i></button>

                    <!-- Edit -->
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editDisability<?php echo $disabilityRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>

                    <!-- Delete -->
                    <button type="button" class="btn btn-outline-danger btn-sm deleteDisability" data-id="<?php echo $disabilityRow['id']; ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>

                <!-- edit disability student-->
                <div class="modal fade" id="editDisability<?php echo $disabilityRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i>Condition Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="" method="POST" class="editDisabilityForm" id="editDisabilityForm<?php echo $disabilityRow['id']; ?>" data-id="<?php echo $disabilityRow['id']; ?>" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label>Condition Description</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-nurse"></i></span>
                              </div>
                              <input type="text" class="form-control" name="edit_description" value="<?=$disabilityRow['description'];?>" required>
                            </div> 
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer justify-content-between">
                        <input type="hidden" name="update_id" value="<?=$disabilityRow['id'];?>">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Update</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- assign student-->
                <div class="modal fade" id="assignTeacher<?php echo $disabilityRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i>Teacher Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="" method="POST" class="assignTeacherForm" id="assignTeacherForm<?php echo $disabilityRow['id']; ?>" data-id="<?php echo $disabilityRow['id']; ?>" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <select class="form-control" name="teacher_id">
                              <option value="0">Select Teacher</option>
                              <?php  
                                $teacher = $connection->query("SELECT * FROM teacher");
                                if ($teacher->num_rows < 1) {
                                  ?>
                                  <option disabled="">No teacher available</option>
                                  <?php
                                }else {
                                  while ($row = $teacher->fetch_array()) {
                                  ?>
                                  <option value="<?php echo $row['teacher_id']; ?>">
                                <?php echo $row['fullname']; ?>
                                  </option>
                                <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer justify-content-between">
                        <input type="hidden" name="disability_id" value="<?=$disabilityRow['id'];?>">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Assign</button>
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
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.column -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<?php include 'footer.php'; ?>

<div class="modal fade" id="addDisability">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-users"></i> Condition Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="add-disability">
      <div class="modal-body">

        <div class="form-group row">
          <div class="col-lg-12">
            <label>Condition Description</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-nurse"></i></span>
              </div>
              <input type="text" class="form-control" name="description" required>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Save</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
  $(document).ready(function(){

    $('#disabilityTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $('#add-disability').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addDisability.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          //console.log(data);
          if (data == "Taken") {
            swal({
              title: "Disability already exist.",
              icon: "warning"
            });

          }else if (data == "Failed") {
            swal({
              title: "Failed to add new disability. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New disability has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $(document).on('submit', '.assignTeacherForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#assignTeacherForm'+id)[0]);

      $.ajax({
        url: "../includes/updateAssignTeacher.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update course information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Teacher has been assigned.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });

    $(document).on('submit', '.editDisabilityForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editDisabilityForm'+id)[0]);

      $.ajax({
        url: "../includes/updateDisability.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update condition information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Condition has been successfully updated.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $(document).on('click', '.deleteDisability', function() {
      var id = $(this).attr('data-id');
      swal({
        title: "Are you sure you want to delete this Condition?",
        text: "Assigned teacher will also deleted as well. \n PROCEED WITH CAUTION!!!",
        icon: "info",
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm"
        }
      }).then(function(event) {
        if (event == true) {
          $.ajax({
            url: "../includes/deleteDisability.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id
            }, success: function(data) {
              console.log(data);
              if (data === "Deleted") {
                swal({
                  title: "Condition has been deleted!",
                  text: "You can't recover this deleted Condition!",
                  icon: "info"
                }).then(function() {
                  location.reload();
                });
              } else {
                swal({
                  title: "Failed to delete this Condition!",
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
