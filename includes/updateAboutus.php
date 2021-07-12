<?php  
	
	include'connection.php';

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$edit_school_name = mysqli_real_escape_string($connection, $_POST['edit_school_name']);
	$edit_school_address = mysqli_real_escape_string($connection, $_POST['edit_school_address']);
	$edit_mission = mysqli_real_escape_string($connection, $_POST['edit_mission']);
	$edit_vision = mysqli_real_escape_string($connection, $_POST['edit_vision']);

	$select = $connection->query("SELECT * FROM about WHERE school_name='$edit_school_name'");

	if ($edit_school_name !== "") {
		$update = $connection->query("UPDATE about SET school_name='$edit_school_name', school_address='$edit_school_address', mission='$edit_mission', vision='$edit_vision' WHERE id='$update_id'");
		if ($update === TRUE) {

			echo "Updated";

			addLog($connection, "admin", "New Update", "Update a About Us to the System.");

		}else{
			echo "Failed";
		}
	}else{
		echo "Failed";
	}	
?>