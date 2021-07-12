<?php  
	
	include'connection.php';

	$school_name = ucfirst(mysqli_real_escape_string($connection, $_POST['school_name']));
	$school_address = ucfirst(mysqli_real_escape_string($connection, $_POST['school_address']));
	$mission = ucfirst(mysqli_real_escape_string($connection, $_POST['mission']));
	$vision = ucfirst(mysqli_real_escape_string($connection, $_POST['vision']));
	
	$select = $connection->query("SELECT * FROM about WHERE school_name='$school_name'");
	
	if ($select->num_rows < 1) {
		
		$insert = $connection->query("INSERT INTO about (school_name, school_address, mission, vision) VALUES ('$school_name', '$school_address', '$mission', '$vision')");

		if ($insert === TRUE) {
			addLog($connection, "admin", "New School Information", "Added a new School Information to the System.");
			echo "Added";
		}else {
			echo "Failed";
		}
	}else {
		echo "Taken";
	}

?>