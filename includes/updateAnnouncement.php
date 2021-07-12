<?php  
	
	include'connection.php';

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$edit_description = mysqli_real_escape_string($connection, $_POST['edit_description']);
	$edit_title = mysqli_real_escape_string($connection, $_POST['edit_title']);
	$edit_created_at = mysqli_real_escape_string($connection, $_POST['edit_created_at']);

	$select = $connection->query("SELECT * FROM announcement WHERE title='$edit_title'");

	if ($edit_title !== "") {
		$update = $connection->query("UPDATE announcement SET title='$edit_title', description='$edit_description', created_at='$edit_created_at' WHERE id='$update_id'");
		if ($update === TRUE) {

			echo "Updated";

			addLog($connection, "admin", "New Update", "Update a Announcement to the System.");

		}else{
			echo "Failed";
		}
	}else{
		echo "Failed";
	}	
?>