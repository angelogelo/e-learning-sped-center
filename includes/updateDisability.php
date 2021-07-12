<?php  
	
	include'connection.php';

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$edit_description = mysqli_real_escape_string($connection, $_POST['edit_description']);

	$select = $connection->query("SELECT * FROM disability WHERE description='$edit_description'");

	if ($edit_description !== "") {
		$update = $connection->query("UPDATE disability SET description='$edit_description' WHERE id='$update_id'");
		if ($update === TRUE) {

			echo "Updated";

			addLog($connection, "admin", "New Update", "Update a Condition to the System.");

		}else{
			echo "Failed";
		}
	}else{
		echo "Failed";
	}	
?>