<?php  
	
	include'connection.php';

	$picture_tmp = $_FILES['picture']['tmp_name'];
	$picture_name = $_FILES['picture']['name'];
	$picture = time()."_".$picture_name;

	$teacher_id = mysqli_real_escape_string($connection, $_POST['teacher_id']);
	$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
	$contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
	$address = mysqli_real_escape_string($connection, $_POST['address']);

	$password = password_hash(strtolower($contact_no), PASSWORD_DEFAULT);
	$type = "teacher";

	$select = $connection->query("SELECT * FROM teacher WHERE teacher_id='$teacher_id'");
	
	if ($select->num_rows < 1) {

		$select_contact_no = $connection->query("SELECT * FROM user WHERE contact_no='$contact_no'");

		if ($select_contact_no->num_rows < 1) {
			
			if (move_uploaded_file($picture_tmp, '../images/teacher/'.$picture)) {
				
				$insert = $connection->query("INSERT INTO teacher (teacher_id, type, picture, fullname, contact_no, email, address, gender) VALUES ('$teacher_id', '$type', '$picture', '$fullname', '$contact_no', '$email', '$address', '$gender')");

				if ($insert === TRUE) {
					
					$user = $connection->query("INSERT INTO user (identification, username, password, picture, type, contact_no) VALUES('$teacher_id', '$teacher_id', '$password', '$picture', '$type', '$contact_no')");
					
					echo "Added";
					addLog($connection, "admin", "New Teacher", "Added a new Teacher to the System.");
				}else {
					echo "Failed";
				}
			}else {
				echo "Failed";
			}
		}else {
			echo "Contact taken";
		}


	}else {
		echo "Taken";
	}

?>