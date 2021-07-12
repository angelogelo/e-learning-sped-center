<?php  
	
	include'connection.php';

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$edit_title = mysqli_real_escape_string($connection, $_POST['edit_title']);

	if ($edit_title !== "") {
		$update = $connection->query("UPDATE flash_cards_title SET title='$edit_title' WHERE id='$update_id'");
		if ($update === TRUE) {

			echo "Updated";

			// addLog($connection, "Teacher", "New Update", "Update a Flash Card Title to the System.");

		}else{
			echo "Failed";
		}
	}else{
		echo "Failed";
	}	
?>