<?php 

	include 'header.php'; 

	$module_id = $_GET['id'];
	$module = $connection->query("SELECT * FROM module WHERE id='$module_id'");
	$moduleRow = $module->fetch_array();

	$teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '".$moduleRow['teacher_id']."'");
	$teacherRow = $teacher->fetch_array();

	$teacher_id = $teacherRow['teacher_id'];
	$viewCount = $moduleRow['view'] == "" ? 0 : $moduleRow['view'];
	$viewCount++;

	$update = $connection->query("UPDATE module SET view='$viewCount' WHERE id = '$module_id'");
	
	//checking if excess
	$check = $connection->query("SELECT * FROM module_view WHERE module_id = '$module_id' AND lrn_id = '$username'");

	if ($check->num_rows < 1) {		
		
		$insert = $connection->query("INSERT INTO module_view (module_id, teacher_id, lrn_id) VALUES ('$module_id','$teacher_id', '$username')");
	}else{
		$update = $connection->query("UPDATE module_view SET created_at = NOW() WHERE lrn_id = '$username'");
	}
	
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
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	    	<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Module Information </h3>
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
			          <a href="#"><?= $teacherRow['fullname']; ?></a>
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
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<?php include 'footer.php'; ?>
