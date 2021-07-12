<?php  
	
	include'connection.php';

	$id = $_POST['id'];
	$delete = $connection->query("DELETE FROM announcement WHERE id='$id'");
	if ($delete === TRUE) {

		addLog($connection, "admin", "New Deleted", "Deleted a Announcement to the System.");

		echo "Deleted";
	} else {
		echo "Error";
	}

?>