<?php  
	
	include'connection.php';

	$title = ucfirst(mysqli_real_escape_string($connection, $_POST['title']));
	$description = ucfirst(mysqli_real_escape_string($connection, $_POST['description']));
	$created_at = ucfirst(mysqli_real_escape_string($connection, $_POST['created_at']));
	
	$insert = $connection->query("INSERT INTO announcement (title, description, created_at) VALUES ('$title', '$description', '$created_at')");

	if ($insert === TRUE) {

		addLog($connection, "admin", "New Announcement", "Added a new Announcement to the System.");

		echo "Added";
	}else {
		echo "Failed";
	}
?>