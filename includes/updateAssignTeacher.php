<?php  
	
	include'connection.php';

	$disability_id = mysqli_real_escape_string($connection, $_POST['disability_id']);
	$teacher_id = ucfirst(mysqli_real_escape_string($connection, $_POST['teacher_id']));

	$update = $connection->query("UPDATE disability SET assign_teacher='$teacher_id' WHERE id='$disability_id'");
		echo "Added";

	if ($update === TRUE) {

		addLog($connection, "admin", "New Assigned", "Assigned New Teacher.");

		echo "Added";
	}else{
		echo "Failed";
	}

?>