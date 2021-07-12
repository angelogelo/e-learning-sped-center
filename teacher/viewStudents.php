<?php 
	
	include 'header.php'; 

	$lrn = mysqli_real_escape_string($connection, $_GET['lrn']);
	$students = $connection->query("SELECT * FROM student WHERE lrn='$lrn'");
	$studentsCount = $students->num_rows;

?>
<br>
<div class="content">
	<?php  

		if ($studentsCount < 1) {
			?>
				<div class="form-group row">
					<div class="col-md-12">
						<div class="jumbotron">
							<p class="display-4"><i class="fa fa-exclamation-triangle"></i> Opps, student not found.</p>
							<br>
							<a href="student.php" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Go back</a>
						</div>
					</div>
				</div>
			<?php
		}else {
			$studentsRow = $students->fetch_array();

			$disability = $studentsRow['disability'];
			$disability = $connection->query("SELECT * FROM disability WHERE id='$disability'");
			$disabilityRow = $disability->fetch_array();
	?>

	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<div class="card card-solid">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				              <div class="card bg-light">
				                <div class="card-header text-muted border-bottom-0">
				                  
				                </div>
				                <div class="card-body pt-0">
				                  <div class="row">
				                    <div class="col-7">
				                      <h2><b><?= $studentsRow['fullname']; ?></b></h2>
				                      <h6><b>Condition: </b> <?= $disabilityRow['description']; ?> </h6>
				                      <h6><b>Gender: </b> <?= $studentsRow['gender']; ?> </h6>
				                      <h6><b>Status: </b> <?= $studentsRow['status']; ?> </h6>
				                      <h5><i class="fas fa-sm fa-id-card-alt"></i> : <?= $studentsRow['contact_no']; ?> </h5>
				                      <h5><i class="fas fa-sm fa-phone"></i> : <?= $studentsRow['contact_no']; ?> </h5>
				                      <h5><i class="fas fa-sm fa-building"></i> : <?= $studentsRow['address']; ?> </h5>
				                    </div>
				                    <div class="col-5 text-center">
				                    	<?php  
											if ($studentsRow['picture'] == "none") {
												?>
													<img src="../images/no-image.png" class="img-circle img-fluid" style="width: 200px;">
												<?php
											}else {
												?>
													<img src="../images/student/<?php echo $studentsRow['picture']; ?>" class="img-circle img-fluid">
												<?php
											}
										?>
				                    </div>
				                  </div>
				                </div>
				                <div class="card-footer">
				                  <div class="text-right">
				                    <a href="student.php" class="btn btn-sm bg-teal">
				                      <i class="fas fa-arrow-left"></i>
				                    </a>
				                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#updateStudentModal"><i class="fa fa-user"></i> Edit Profile</button>
				                  </div>
				                </div>
				              </div>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>

<div class="modal fade" id="updateStudentModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i>Update Student's Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
	    <form action="" method="POST" enctype="multipart/form-data" id="updateStudentForm">
	      <div class="modal-body">
	        <div class="row">

				<div class="col-sm-6">
					<div class="form-group">
						<?php
                            if ($studentsRow['picture'] == "" || $studentsRow['picture'] == NULL) {
                              $updatePictureDisplay = "no_image.png";
                            }else {
                              $updatePictureDisplay = $studentsRow['picture'];
                            }
                        ?>
                      <img id="picture_display" class="img-circle img-fluid" src="../images/student/<?php echo $updatePictureDisplay; ?>" style="width: 200px; display: block; margin-right: auto; margin-left: auto;">
					</div>
					<div class="form-group">
						<p class="h6">Picture:</p>
						<div class="custom-file">
							<input type="file" name="picture" id="picture" class="custom-file-input form-control-sm" accept="image/*">
							<label class="custom-file-label">Choose picture</label>
						</div>
					</div>

					<div class="form-group">
						<label>Learning Reference Number (LRN)</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
							</div>
								<input type="text" class="form-control" name="lrn" value="<?php echo $studentsRow['lrn']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label>Student Disability</label>
						<select name="disability" id="disability" class="custom-select">
							<option selected="" value="<?php echo $studentsRow['disability']; ?>">Select Student Condition</option>
							<?php  
								$disability = $connection->query("SELECT * FROM disability");
								if ($disability->num_rows < 1) {
							?>
								<option disabled="">No disability available</option>
							<?php
								}else {
								while ($row = $disability->fetch_array()) {
							?>
								
								<option value="<?php echo $row['id']; ?>"> <?php echo $row['description']; ?> <?php echo ($row['id'] == $studentsRow['disability']) ? '- Current' : null; ?></option>
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
								<input type="text" class="form-control" name="fullname" placeholder="Firstname        Middlename        Lastname" value="<?php echo $studentsRow['fullname']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label>Contact No.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
								<input type="text" class="form-control" name="contact_no" value="<?php echo $studentsRow['contact_no']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label>Address</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-address-book"></i></span>
							</div>
								<input type="text" class="form-control" name="address" value="<?php echo $studentsRow['address']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label>Gender</label><br>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" name="gender" id="gendermale" class="custom-control-input" value="Male" <?php echo ($studentsRow['gender'] == 'Male') ? 'checked' : null; ?> required>
					  		<label class="custom-control-label" for="gendermale">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" name="gender" id="genderfemale" class="custom-control-input" value="Female" <?php echo ($studentsRow['gender'] == 'Female') ? 'checked' : null; ?> required>
					  		<label class="custom-control-label" for="genderfemale">Female</label>
						</div>
					</div>
				</div>
	        </div><!--row-->
	      </div><!--modal-body-->
	      <div class="modal-footer justify-content-between">
	      	<input type="hidden" name="update_id" id="update_id" value="<?php echo $studentsRow['id']; ?>">
	        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Save</button>
	      </div>
	    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include 'footer.php' ?>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#updateStudentForm').submit(function(e){
			e.preventDefault();
			var formData = new FormData($(this)[0]);

			$.ajax({
				url: "../includes/updateStudent.php",
				method: "POST",
				dataType: "TEXT",
				contentType: false,
				processData: false,
				data: formData,
				success: function(data){
					console.log(data);
					if (data == "Failed") {
						swal({
							title: "Failed to update student's information. Please try again later.",
							icon: "error"
						});

					}else {
						swal({
							title: "Student's information has been updated.",
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