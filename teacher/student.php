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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addTeacher"><i class="fas fa-plus-circle nav-icon"></i> | Add Student</button><br><br>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <table id="studentTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>LRN</th>
                <th>Picture</th>
                <th>Fullname</th>
                <th>Condition</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php

                  $disability = $connection->query("SELECT * FROM disability WHERE assign_teacher = '".$teacherRow['teacher_id']."'");
                  while($disabilityRow = $disability->fetch_array()){
                  $number = 1;
                  $student = $connection->query("SELECT * FROM student WHERE disability = '".$disabilityRow['id']."'");
                  while($studentRow = $student->fetch_array()){

                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$studentRow['lrn'];?></td>
                  <td>
                    <?php  
                        if ($studentRow['picture'] == "none" || $studentRow['picture'] == NULL) {
                            ?>
                                <img src="../images/no_image.png" class="img-fluid rounded" style="width: 50px; height: 50px;">
                            <?php
                        }else {
                            ?>
                                <img src="../images/student/<?php echo $studentRow['picture']; ?>" class="img-fluid rounded" style="width: 50px; height: 50px; margin-right: auto; margin-left: auto; display: block;">
                            <?php
                        }
                    ?>
                  </td>
                  <td><?=$studentRow['fullname'];?></td>
                  <td><?=$disabilityRow['description'];?></td>
                  <td>
                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm viewStudent" data-toggle="tooltip" data-placement="top" data-lrn="<?php echo $studentRow['lrn']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Delete -->
                    <button type="button" class="btn btn-outline-danger btn-sm deleteStudent" data-id="<?php echo $studentRow['lrn']; ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <?php
                  }
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
          <i class="fas fa-info-circle"></i> Student's Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="addStudentForm">
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
              <label>Learning Reference Number (LRN)</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="lrn" required>
              </div>
            </div>
            <div class="form-group">
              <label>Student Disability</label>
              <select name="disability" id="disability" class="custom-select" required>
                <option selected="" disabled="" value="">Select Student Disability</option>
                <?php  
                  $disability = $connection->query("SELECT * FROM disability WHERE assign_teacher='$username'");
                  if ($disability->num_rows < 1) {
                    ?>
                      <option disabled="">No disability available</option>
                    <?php
                  }else {
                    while ($row = $disability->fetch_array()) {
                      ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></option>
                      <?php
                    }
                  }
                ?>
              </select>
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



<script type="text/javascript">
  $(document).ready(function(){

    $('#studentTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.viewStudent', function(){
      var lrn = $(this).attr('data-lrn');
      window.location.href = 'viewStudents.php?lrn='+lrn;
    });
    
    $('#addStudentForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addStudent.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          //console.log(data);
          if (data == "Taken") {
            swal({
              title: "LRN already exist.",
              icon: "warning"
            });

          }else if (data == "Contact taken") {
            swal({
              title: "Contact number is taken. Please choose another one.",
              icon: "warning"
            });

          }else if (data == "Failed") {
            swal({
              title: "Failed to add new student. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New student has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });

    $(document).on('click', '.deleteStudent', function() {
      var id = $(this).attr('data-id');
      swal({
        title: "Are you sure you want to delete this Student?",
        text: "PROCEED WITH CAUTION!!!",
        icon: "info",
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm"
        }
      }).then(function(event) {
        if (event == true) {
          $.ajax({
            url: "../includes/deleteStudent.php",
            method: "POST",
            dataType: "TEXT",
            data: {
              id: id
            }, success: function(data) {
              console.log(data);
              if (data === "Deleted") {
                swal({
                  title: "Student has been deleted!",
                  text: "You can't recover this deleted Students!",
                  icon: "info"
                }).then(function() {
                  location.reload();
                });
              } else {
                swal({
                  title: "Failed to delete this Student!",
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
