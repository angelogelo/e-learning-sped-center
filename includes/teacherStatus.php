<?php  

	include'connection.php';
	$id = mysqli_real_escape_string($connection, $_POST['id']);
	$status = mysqli_real_escape_string($connection, $_POST['status']);

	$update = $connection->query("UPDATE teacher SET status='$status' WHERE id='$id'");
	if ($update === TRUE) {
		echo "Updated";
		addLog($connection, "admin", "Updates staff status", "Updated the staff status to ".$status.".");
	}else {
		echo "Failed";
	}

?>