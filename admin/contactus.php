<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-phone"></i> Contat Us</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Contact Us</li>
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
            <table id="contactUsTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Contact No</th>
                <th>Social Media Account</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $contact = $connection->query("SELECT * FROM contact");
                  $number = 1;
                  while ($contactRow = $contact->fetch_array()) {                                
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$contactRow['contact_no'];?></td>
                  <td><?=$contactRow['social_media'];?></td>
                  <td><?=$contactRow['email'];?></td>
                  <td>
                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm viewContact" data-toggle="tooltip" data-placement="top" data-id="<?php echo $contactRow['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Edit -->
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editContactUs<?php echo $contactRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>
                  </td>
                </tr>

                <div class="modal fade" id="editContactUs<?php echo $contactRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> Contact Us Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="" method="POST" class="editContactUsForm" id="editContactUsForm<?php echo $contactRow['id']; ?>" data-id="<?php echo $contactRow['id']; ?>" enctype="multipart/form-data">
                      <div class="modal-body">

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>Contact No.</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                              <input type="text" class="form-control" name="edit_contact_no" value="<?= $contactRow['contact_no']; ?>" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>Social Media Account</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                              </div>
                              <input type="text" class="form-control" name="edit_social_media" value="<?= $contactRow['social_media']; ?>" required>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-lg-12">
                              <label>Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                              </div>
                              <input type="email" class="form-control" name="edit_email" value="<?= $contactRow['email']; ?>" required>
                            </div>
                          </div>
                        </div>

                      </div><!--modal-body-->
                      <div class="modal-footer justify-content-between">
                        <input type="hidden" name="update_id" value="<?=$contactRow['id'];?>">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Update</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="viewContactModal<?php echo $contactRow['id']; ?>">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">
                          <i class="fas fa-info-circle"></i> Contact Us Information
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Contact No.</label>
                            <p class="h6"><?=$contactRow['contact_no'];?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Social Media</label>
                            <p class="h6"><?=$contactRow['social_media'];?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label class="col-form-label">Email</label>
                            <p class="h6"><?=$contactRow['email'];?></p>
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

<div class="modal fade" id="addContactUs">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-phone"></i> Contact Us
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="add-ContactUs">
      <div class="modal-body">

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

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Social Media Account</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
              </div>
              <input type="text" class="form-control" name="social_media" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label>Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
              </div>
              <input type="email" class="form-control" name="email" required>
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

    $('#contactUsTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.viewContact', function(){
      var id = $(this).attr('data-id');
      $('#viewContactModal'+id).modal('show');
    });


    $(document).on('submit', '.editContactUsForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editContactUsForm'+id)[0]);

      $.ajax({
        url: "../includes/updateContactUs.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update contact us information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Contact Us has been successfully updated.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $('#add-ContactUs').submit(function(e){
      e.preventDefault();

      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addContactUs.php",
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
              title: "Contact already exist.",
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
              title: "Contact Us has been added.",
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
