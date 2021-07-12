<?php 

	include '../includes/connection.php'; 

	$module_id = $_GET['id'];
	$module = $connection->query("SELECT * FROM module WHERE id='$module_id'");
	$moduleRow = $module->fetch_array();

	$teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id = '".$moduleRow['teacher_id']."'");
	$teacherRow = $teacher->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>NRES - SPED</title>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icon -->
  <link rel="icon" href="../images/spedLogo.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
	<body class="hold-transition sidebar-mini" onafterprint="closeWindow()">
		<div class="wrapper">
			<div class="container py-3">
			    <div class="form-group row">
			      <div class="col-md-12 text-center">
			        <img src="../images/spedLogo.png" style="height: 100px;">
			        <br>
			        <br>
			        <h3><b>List of Student Who View Module</b></h3>
			      </div>
			    </div>

			    <hr class="shadow">

				<div class="form-group row">
					<div class="col-md-12 table-responsive">
					  <table class="table table-hover table-striped">
					    <thead class="bg-danger text-white">
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
								<td><?= date('M d, Y', strtotime($moduleViewRow['created_at'])); ?></td>
							</tr>
							<?php } ?>
					    </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
		<!-- REQUIRED SCRIPTS -->
		<!-- jQuery -->
		<script src="../assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="../assets/dist/js/adminlte.min.js"></script>
		<!-- DataTables -->
		<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<!-- Sweetalert -->
		<script src="../assets/sweetalert/sweetalert.min.js"></script>
	</body>
</html>

<script type="text/javascript">
  setTimeout(function() {
    window.print();
  }, 1000);

  function closeWindow() {
    window.close();
  }
</script>