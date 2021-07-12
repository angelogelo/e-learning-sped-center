<?php  
	
	include'connection.php';

	$id = $_POST['id'];
	$delete = $connection->query("DELETE FROM disability WHERE id='$id'");
	if ($delete === TRUE) {

		addLog($connection, "admin", "New Deleted", "Deleted a Disability to the System.");

		echo "Deleted";
	} else {
		echo "Error";
	}

?>