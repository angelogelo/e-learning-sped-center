<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-chalkboard-teacher"></i> Teacher</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Teacher</li>
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addTeacher"><i class="fas fa-plus-circle nav-icon"></i> | Add Teacher</button><br><br>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <table id="teachersTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Teacher ID</th>
                <th>Picture</th>
                <th>Fullname</th>
                <th>Contact No</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $teacher = $connection->query("SELECT * FROM teacher");
                  $number = 1;
                  while ($teacherRow = $teacher->fetch_array()) {                                
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$teacherRow['teacher_id'];?></td>
                  <td>
                    <?php  
                        if ($teacherRow['picture'] == "none" || $teacherRow['picture'] == NULL) {
                            ?>
                                <img src="../images/no_image.png" class="img-fluid rounded" style="width: 50px; height: 50px;">
                            <?php
                        }else {
                            ?>
                                <img src="../images/teacher/<?php echo $teacherRow['picture']; ?>" class="img-fluid rounded" style="width: 50px; height: 50px; margin-right: auto; margin-left: auto; display: block;">
                            <?php
                        }
                    ?>
                  </td>
                  <td><?=$teacherRow['fullname'];?></td>
                  <td><?=$teacherRow['contact_no'];?></td>
                  <td>

                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm viewTeacher" data-toggle="tooltip" data-placement="top" data-id="<?php echo $teacherRow['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Delete -->
                    <button type="button" class="btn btn-outline-danger btn-sm deleteTeacher" data-id="<?php echo $teacherRow['teacher_id']; ?>"><i class="fa fa-trash"></i></button>

                  </td>
                </tr>

                <!--viewTeachearModal-->
                <div class="modal fade" id="viewTeacherModal<?php echo $teacherRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> Teacher's Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-6 mx-auto text-center">
                            <img src="../images/teacher/<?php echo $teacherRow['picture']; ?>" class="user-image img-circle elevation-2" style="width: 200px; height: 200px;">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-6">
                            <label class="col-form-label">Teacher ID</label>
                            <p class="h6"><?=$teacherRow['teacher_id'];?></p>
                          </div>

                          <div class="col-md-6">
                            <label class="col-form-label">User Type</label>
                            <p class="h6"><?=$teacherRow['type'];?></p>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <label class="col-form-label">Teacher Name</label>
                            <p class="h6"><?=$teacherRow['fullname'];?></p>
                          </div>
                          <div class="col-md-6">
                            <label class="col-form-label">Gender</label>
                            <p class="h6"><?=$teacherRow['gender'];?></p>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <label class="col-form-label">Contact No.</label>
                            <p class="h6"><?=$teacherRow['contact_no'];?></p>
                          </div>
                          <div class="col-md-6">
                            <label class="col-form-label">Address</label>
                            <p class="h6"><?=$teacherRow['address'];?></p>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Status : <?php echo ucfirst($teacherRow['status']); ?></label>
                            <select name="emp_status" id="emp_status<?php echo $teacherRow['id']; ?>" class="custom-select custom-select-sm teacherStatus" data-id="<?php echo $teacherRow['id']; ?>">
                              <option value="" disabled="" selected="">Select status</option>
                              <option value="activated">Activated</option>
                              <option value="deactivated">Deactivated</option>
                            </select>
                          </div>
                        </div>
                      </div><!--modal-body-->
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


<div class="modal fade" id="addTeacher">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> Teacher's Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="addTeacherForm">
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-6">
            <div class="form-group">
              <img id="picture_display" class="img-fluid rounded" src="../images/question-mark.png" style="width: 200px; display: block; margin-right: auto; margin-left: auto;">
            </div>
            <div class="form-group">
              <p class="h6">Picture:</p>
              <div class="custom-file">
                <input type="file" name="picture" id="picture" class="custom-file-input form-control-sm" accept="image/*" required>
                <label class="custom-file-label">Choose picture</label>
              </div>
            </div>
            <div class="form-group">
              <label>Teacher ID</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="teacher_id" required>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Full Name</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="fullname" placeholder="Firstname        Middlename        Lastname" required>
              </div>
            </div>
            <div class="form-group">
              <label>Contact No.</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="contact_no" required>
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                </div>
                <input type="email" class="form-control" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                </div>
                <input type="text" class="form-control" name="address" required>
              </div>
            </div>
            <div class="form-group">
              <label>Gender</label><br>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="gender" id="gendermale" class="custom-control-input" value="Male" required>
                <label class="custom-control-label" for="gendermale">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="gender" id="genderfemale" class="custom-control-input" value="Female" required>
                <label class="custom-control-label" for="genderfemale">Female</label>
              </div>
            </div>
          </div>

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



<script type="text/javascript">
  $(document).ready(function(){

    $('#teachersTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
    $(document).on('click', '.viewTeacher', function(){
      var id = $(this).attr('data-id');
      $('#viewTeacherModal'+id).modal('show');
    });

    $(document).on('click', '.assignTeacher', function(){
      var id = $(this).attr('data-id');
      $('#assignTeacherModal'+id).modal('show');
    });

    $('#addTeacherForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addTeacher.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          console.log(data);
          if (data == "Taken") {
            swal({
              title: "Teacher already exist.",
              icon: "warning"
            });

          }else if (data == "Contact taken") {
            swal({
              title: "Contact number is taken. Please choose another one.",
              icon: "warning"
            });

          }else if (data == "Failed") {
            swal({
              title: "Failed to add new teacher. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New teacher has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $(document).on('change', '.teacherStatus', function(){
      var id = $(this).attr('data-id');
      var status = $(this).val();

      swal({
        title: "Are you sure you want to update this staff's status to "+status+"?",
        icon: "warning",
        buttons: {
          cancel: "Cancel",
          yes: "Yes"
        }
      }).then(function(event) {
        if (event == "yes") {
          $.ajax({
            url: "../includes/teacherStatus.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id,
              status: status
            },success: function(data) {
              if (data == "Updated") {
                swal({
                  title: "Teacher's status has been updated to "+status+".",
                  icon: "success"
                }).then(function(){
                  location.reload();
                });

              }else {
                swal({
                  title: "Failed to update teacher's status. Please try again later.",
                  icon: "error"
                });
              }
            }
          })

        }else {
          //
        }
      });
    });

    $(document).on('click', '.deleteTeacher', function() {
      var id = $(this).attr('data-id');
      swal({
        title: "Are you sure you want to delete this Teacher?",
        text: "Account related to this will be deleted as well. \n PROCEED WITH CAUTION!!!",
        icon: "info",
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm"
        }
      }).then(function(event) {
        if (event == true) {
          $.ajax({
            url: "../includes/deleteTeacher.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id
            }, success: function(data) {
              console.log(data);
              if (data === "Deleted") {
                swal({
                  title: "Teahcer has been deleted!",
                  text: "You can't recover this deleted Disability!",
                  icon: "info"
                }).then(function() {
                  location.reload();
                });
              } else {
                swal({
                  title: "Failed to delete this Teacher!",
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
