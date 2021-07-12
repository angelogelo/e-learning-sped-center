<?php include 'header.php'; ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-list"></i> Activity Logs</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Activity Logs</li>
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
            <table id="logsTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>User</th>
                <th>Username</th>
                <th>Contact No</th>
                <th>Activity</th>
                <th>Log day/time</th>
              </tr>
              </thead>
              <tbody>
                <?php
                
                  $disability = $connection->query("SELECT * FROM disability WHERE assign_teacher = '".$_SESSION['teacher']."'");
                  while($disabilityRow = $disability->fetch_array()){
                  $number = 1;
                  $student = $connection->query("SELECT * FROM student WHERE disability = '".$disabilityRow['id']."'");
                  while($studentRow = $student->fetch_array()){
                  $user = "Student";

                  $lrn = $studentRow['lrn'];
                  $logs = $connection->query("SELECT * FROM logs WHERE user = '".$studentRow['lrn']."' ORDER BY created_at DESC ");
                  while($logsRow = $logs->fetch_array()){

                ?>
                <tr class="viewLogs" data-id="<?php echo $logsRow['id']; ?>" data-toggle="tooltip" data-placement="top" title="Click to view logs">
                  <td><?php echo $number++;?></td>
                  <td><?= $user; ?></td>
                  <td><?= $studentRow['lrn']; ?></td>
                  <td><?= $studentRow['contact_no']; ?></td>
                  <td><?php echo $logsRow['title']; ?></td>
                  <td><?php echo diffForHumans($logsRow['created_at']); ?></td>
                </tr>

                <div class="modal fade" id="showLog<?php echo $logsRow['id']; ?>">
                  <div class="modal-dialog" style="max-width: 600px;">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="fa fa-list"></i> Activity Log</h5>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Name / Username: </p>
                            <p class="h6"><?= $studentRow['fullname']." / ".$studentRow['lrn']; ?> </p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Title: </p>
                            <p class="h6"><?php echo $logsRow['title']; ?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Details: </p>
                            <p class="h6"><?php echo $logsRow['details']; ?></p>
                          </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Log day/time: </p>
                            <p class="h6"><?php echo date("M d, Y @ h:ia", strtotime($logsRow['created_at'])); ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                    }
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

<script type="text/javascript">
  $(document).ready(function(){

    $('#logsTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.viewLogs', function() {
      var id = $(this).attr('data-id');

      $('#showLog'+id).modal('show');
    });

  });
</script>
