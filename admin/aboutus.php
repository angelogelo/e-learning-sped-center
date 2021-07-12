  <?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-info-circle"></i> About Us</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">About Us</li>
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
        <br><br>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <table id="aboutUsTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Shool Name</th>
                <th>School Address</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $aboutus = $connection->query("SELECT * FROM about");
                  $number = 1;
                  while ($aboutusRow = $aboutus->fetch_array()) {                                
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$aboutusRow['school_name'];?></td>
                  <td><?=$aboutusRow['school_address'];?></td>
                  <td>
                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm viewAbout" data-toggle="tooltip" data-placement="top" data-id="<?php echo $aboutusRow['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Edit -->
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editAboutUs<?php echo $aboutusRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>
                  </td>
                </tr>

                <div class="modal fade" id="editAboutUs<?php echo $aboutusRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> Announcement Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="" method="POST" class="editAboutUsForm" id="editAboutUsForm<?php echo $aboutusRow['id']; ?>" data-id="<?php echo $aboutusRow['id']; ?>" enctype="multipart/form-data">
                      <div class="modal-body">

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>School Name</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-school"></i></span>
                              </div>
                              <input type="text" class="form-control" name="edit_school_name" value="<?=$aboutusRow['school_name'];?>" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>School Address</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                              </div>
                              <textarea class="form-control" rows="1" name="edit_school_address" required> <?=$aboutusRow['school_address'];?> </textarea>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>Mission</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
                              </div>
                              <textarea class="form-control" rows="3" name="edit_mission" required> <?=$aboutusRow['mission'];?> </textarea>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>Vision</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                              </div>
                              <textarea class="form-control" rows="3" name="edit_vision" required> <?=$aboutusRow['vision'];?> </textarea>
                            </div>
                          </div>
                        </div>

                      </div><!--modal-body-->
                      <div class="modal-footer justify-content-between">
                        <input type="hidden" name="update_id" value="<?=$aboutusRow['id'];?>">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Update</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="viewAboutModal<?php echo $aboutusRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> About Us Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">School Name</label>
                            <p class="h6"><?=$aboutusRow['school_name'];?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">School Address</label>
                            <p class="h6"><?=$aboutusRow['school_address'];?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Mission</label>
                            <p class="h6"><?=$aboutusRow['mission'];?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Vision</label>
                            <p class="h6"><?=$aboutusRow['vision'];?></p>
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


<div class="modal fade" id="addSchoolInfo">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> About Us
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="add-SchoolInfo">
      <div class="modal-body">

        <div class="form-group row">
          <div class="col-lg-12">
              <label>School Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-school"></i></span>
              </div>
              <input type="text" class="form-control" name="school_name" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label>School Address</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <textarea class="form-control" rows="3" name="school_address" required></textarea>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Mission</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
              </div>
              <textarea class="form-control" rows="3" name="mission" required></textarea>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Vision</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-eye"></i></span>
              </div>
              <textarea class="form-control" rows="3" name="vision" required></textarea>
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

    $('#aboutUsTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.viewAbout', function(){
      var id = $(this).attr('data-id');
      $('#viewAboutModal'+id).modal('show');
    });

    $(document).on('submit', '.editAboutUsForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editAboutUsForm'+id)[0]);

      $.ajax({
        url: "../includes/updateAboutUs.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update aboustus information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "About Us has been successfully updated.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $('#add-SchoolInfo').submit(function(e){
      e.preventDefault();

      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addInformation.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          //console.log(data);
          if (data == "Taken") {
            swal({
              type:'error',
              title: "School already exist.",
              icon: "warning"
            }); 

            }else if (data == "Failed") {
            swal({
              type:'error',
              title: "Failed to add course. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              type:'success',
              title: "School Information has been added.",
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
