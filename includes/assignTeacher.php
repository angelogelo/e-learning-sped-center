<?php  
	
	include'connection.php';
	
	$teacher_id = $_POST['teacher_id'];
	$disability = $_POST['disability'];

	$getDisability = implode(",", $disability);

	$insert = $connection->query("INSERT INTO assign_teacher (teacher_id, disability_id) VALUES ('$teacher_id', '$getDisability')");
	
	if ($insert === TRUE) {
		echo "Added";
		header("location: ../admin/teacher.php");
	}else{
		echo "Failed";
	}	
?>