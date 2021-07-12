<?php  
	
	include'connection.php';

	$id = $_POST['id'];
	$delete = $connection->query("DELETE FROM video WHERE id='$id'");
	if ($delete === TRUE) {

		//addLog($connection, "admin", "New Deleted", "Deleted a Module to the System.");

		echo "Deleted";
	} else {
		echo "Error";
	}

?>