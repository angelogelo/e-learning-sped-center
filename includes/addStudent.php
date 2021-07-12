<?php  
	
	include'connection.php';

	$picture_tmp = $_FILES['picture']['tmp_name'];
	$picture_name = $_FILES['picture']['name'];
	$picture = time()."_".$picture_name;

	$lrn = mysqli_real_escape_string($connection, $_POST['lrn']);
	$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
	$contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
	$address = mysqli_real_escape_string($connection, $_POST['address']);
	$disability = mysqli_real_escape_string($connection, $_POST['disability']);
	$teacher_id = mysqli_real_escape_string($connection, $_POST['teacher_id']);

	$password = password_hash(strtolower($contact_no), PASSWORD_DEFAULT);
	$type = "student";

	$select = $connection->query("SELECT * FROM student WHERE lrn='$lrn'");
	if ($select->num_rows < 1) {

		$select_contact_no = $connection->query("SELECT * FROM user WHERE contact_no='$contact_no'");

		if ($select_contact_no->num_rows < 1) {
			if (move_uploaded_file($picture_tmp, '../images/student/'.$picture)) {
				
				$insert = $connection->query("INSERT INTO student (lrn, type, picture, fullname, disability, contact_no, address, gender) VALUES ('$lrn', '$type', '$picture', '$fullname', '$disability', '$contact_no', '$address', '$gender')");

				if ($insert === TRUE) {

					$user = $connection->query("INSERT INTO user (identification, username, password, picture, type, contact_no) VALUES('$lrn', '$lrn', '$password', '$picture', '$type', '$contact_no')");
					
					echo "Added";

					addLog($connection, $teacher_id, "New Student", "Added a new Student to the System.");
					$time = time();
					$addLogin = $connection->query("INSERT INTO login_details (user_id, last_login) VALUES ('$lrn','$time')");

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