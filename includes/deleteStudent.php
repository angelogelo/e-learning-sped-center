<?php  
	
	include'connection.php';

	$id = $_POST['id'];
	$delete = $connection->query("DELETE FROM student WHERE lrn='$id'");

	if ($delete === TRUE) {

		$deleteUser = $connection->query("DELETE FROM user WHERE username='$id'");
		addLog($connection, "admin", "New Deleted", "Deleted a Student to the System.");

		echo "Deleted";
	} else {
		echo "Error";
	}

?>