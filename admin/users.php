<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-users"></i> User Account</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">User Account</li>
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addUser"><i class="fas fa-plus-circle nav-icon"></i> | Add Admin</button><br><br>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <table id="usersTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Picture</th>
                <th>Username</th>
                <th>Password</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $users = $connection->query("SELECT * FROM user WHERE type = 'admin'");
                  $number = 1;
                  while ($usersRow = $users->fetch_array()) {                                
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td>
                    <?php  
                        if ($usersRow['picture'] == "none" || $usersRow['picture'] == NULL) {
                            ?>
                                <img src="../images/no_image.png" class="img-fluid rounded" style="width: 50px; height: 50px;">
                            <?php
                        }else {
                            ?>
                                <img src="../images/admin/<?php echo $usersRow['picture']; ?>" class="img-fluid rounded" style="width: 50px; height: 50px; margin-right: auto; margin-left: auto; display: block;">
                            <?php
                        }
                    ?>
                  </td>
                  <td><?=$usersRow['username'];?></td>
                  <td><?=$usersRow['password'];?></td>
                  <td><?=$usersRow['type'];?></td>
                  <td>
                    <?php  
                      if ($usersRow['status'] == 'pending') {
                      ?>
                        <span class="badge badge-danger">
                          <i class="fa fa-exclamation"></i> | DEACTIVATED
                        </span>
                      <?php
                      }else {
                      ?>
                        <span class="badge badge-success">
                          <i class="fa fa-check-circle"></i> | ACTIVATED
                        </span>
                        <?php
                      }
                    ?>
                  </td>
                  <td>
                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm viewInfo" data-toggle="tooltip" data-placement="top" data-id="<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Edit -->
                    <button data-tooltip="tooltip" title="Click to Edit" class="btn btn-outline-primary btn-sm editInfo" data-toggle="tooltip" data-placement="top" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>

                    <!-- Delete -->
                    <button data-tooltip="tooltip" title="Click to Delete" class="btn btn-outline-danger btn-sm deleteInfo" data-toggle="tooltip" data-placement="top" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
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

<div class="modal fade" id="addUser">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-users"></i> User Account
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="add-user">
      <div class="modal-body">

        <div class="form-group row">
          <div class="col-lg-12">
              <img id="picture_display" class="img-fluid rounded" src="../images/question-mark.png" style="width: 200px; display: block; margin-right: auto; margin-left: auto;">
              <label>Picture</label>
              <div class="custom-file">
                <input type="file" name="picture" id="picture" class="custom-file-input form-control-sm" accept="image/*" required>
                <label class="custom-file-label">Choose picture</label>
              </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Fullname</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-portrait"></i></span>
              </div>
              <input type="text" class="form-control" name="fullname" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
              </div>
              <input type="text" class="form-control" name="username" required>
            </div>
          </div>
        </div>

<!--         <div class="form-group row">
          <div class="col-lg-12">
              <label>Password</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" name="password" required>
            </div>
          </div>
        </div> -->

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Contact No.</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" name="contact_no" required>
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

    $('#usersTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $('#add-user').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addUser.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          //console.log(data);
          if (data == "Taken") {
            swal({
              title: "Username already exist.",
              icon: "warning"
            });

          }else if (data == "Contact taken") {
            swal({
              title: "Contact number is taken. Please choose another one.",
              icon: "warning"
            });

          }else if (data == "Failed") {
            swal({
              title: "Failed to add new admin. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New admin has been added.",
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
