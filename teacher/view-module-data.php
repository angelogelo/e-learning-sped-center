<?php 

	include 'header.php'; 

	$module_id = $_GET['id'];
	$module = $connection->query("SELECT * FROM module WHERE id='$module_id'");
	$moduleRow = $module->fetch_array();

	$teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '".$moduleRow['teacher_id']."'");
	$teacherRow = $teacher->fetch_array();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	    	<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Module Information</h3>
					<div class="card-tools">
						<a href="view-module.php?id=<?= $moduleRow['disability']; ?>" class="btn btn-secondary btn-sm view-module"><i class="fas fa-arrow-left"></i> Go Back</a>
					</div>
				</div>          
			  <div class="card-body">
			    <div class="post">
			      <div class="user-block">
			      	<?php  
                        if ($teacherRow['picture'] == "none" || $teacherRow['picture'] == NULL) {
                            ?>
                                <img class="img-circle img-bordered-sm" src="../images/no_image.png" alt="user image">
                            <?php
                        }else {
                            ?>
                            	<img class="img-circle img-bordered-sm" src="../images/teacher/<?php echo $teacherRow['picture']; ?>" alt="user image">
                            <?php
                        }
                    ?>
			        <span class="username">
			        	<?php

			        		if ($moduleRow['teacher_id'] == $teacherRow['teacher_id']) {
			        			?>
			        				<a href="#">You</a>
			        			<?php
			        		}else{
			        			?>

			        			<?php
			        		}
			        	?>
			        	
			        </span>
			        <span class="description">Upload publicly - <?= diffForHumans($moduleRow['created_at']); ?></span>
			      </div>
			      <!-- /.user-block -->
			      <p>
			        <?= $moduleRow['title']; ?>
			      </p>

			      <p>
			        <a href="../files/<?php echo $moduleRow['file']; ?>" class="link-black text-sm text-primary"><i class="fas fa-link mr-1"></i> Download File Here!</a>
			      </p>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Student Who View This Module</h3>

					<div class="card-tools">

		              <!-- <a href="" type="button" class="btn btn-success btn-sm-" data-toggle="modal" data-target="#print"><i class="fas fa-print"></i></a> -->

		              <button type="button" class="btn btn-success btn-sm print" data-id="<?php echo $moduleRow['id']; ?>"><i class="fas fa-print"></i></button>

		            </div>
				</div>          
			  <div class="card-body">
			  	<table id="viewModuleDataTable" class="table table-bordered table-hover text-nowrap table-sm">
			  		<thead style="background-color: #b2bdb5;">
						<tr>
							<th class="table-plus datatable-nosort" >No</th>
							<th>Student Name</th>
							<th>Time View</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$moduleView = $connection->query("SELECT * FROM module_view WHERE module_id='$module_id'");
							$number = 1;
							while ($moduleViewRow = $moduleView->fetch_array()) {

							$student = $connection->query("SELECT * FROM student WHERE lrn = '".$moduleViewRow['lrn_id']."'");
							$studentRow = $student->fetch_array();
						?>
						<tr>
							<td><?= $number++; ?></td>
							<td><?= $studentRow['fullname'];?></td>
							<td><?= diffForHumans($moduleViewRow['created_at']); ?></td>
						</tr>
						<?php } ?>
					</tbody>
			  	</table>
			  </div>
			</div>
		</div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<?php include 'footer.php'; ?>

<script type="text/javascript">

  $(document).ready(function(){

    $('#viewModuleDataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on('click', '.print', function(){
      var id = $(this).attr('data-id');

      window.location.href = 'print.php?id='+id;
    });

  });

</script>
