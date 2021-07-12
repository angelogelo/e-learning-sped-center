<?php  
	
	include'connection.php';

	$description = mysqli_real_escape_string($connection, $_POST['description']);

	$select = $connection->query("SELECT * FROM disability WHERE description='$description'");

	if ($select->num_rows < 1) {
		$insert = $connection->query("INSERT INTO disability (description) VALUES ('$description')");
		if ($insert === TRUE) {
			addLog($connection, "admin", "New Disability", "Added a new Disability to the System.");
			echo "Added";
		}else{
			echo "Failed";
		}
	}else{
		echo "Taken";
	}	
?>