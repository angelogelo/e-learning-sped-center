<?php  
	
	include'connection.php';

	$id = $_POST['id'];
	$delete = $connection->query("DELETE FROM flash_cards_title WHERE id='$id'");
	if ($delete === TRUE) {

		$deleting = $connection->query("DELETE FROM flash_cards_file WHERE title_id='$id'");

		// addLog($connection, "Teacher", "New Deleted", "Deleted a Flash Card Title to the System.");

		echo "Deleted";
	} else {
		echo "Error";
	}

?>