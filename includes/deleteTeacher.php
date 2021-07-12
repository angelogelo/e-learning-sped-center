<?php  
	
	include'connection.php';

	$teacher_id = $_POST['id'];
	$delete = $connection->query("DELETE FROM teacher WHERE teacher_id='$teacher_id'");
	if ($delete === TRUE) {
		$delete1 = $connection->query("DELETE FROM user WHERE username='$teacher_id'");
		if ($delete1 === TRUE) {
			addLog($connection, "admin", "Deleted Teacher", "Deleted a Teacher to the System.");
			echo "Deleted";
		} else {
			echo "Error";
		}
	} else {
		echo "Error";
	}

?>