<?php  
	
	include'connection.php';

	$picture_tmp = $_FILES['picture']['tmp_name'];
	$picture_name = $_FILES['picture']['name'];
	$picture = time()."_".$picture_name;

	$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
	$type = "admin";
	$password = password_hash(strtolower($contact_no), PASSWORD_DEFAULT);


	$select_username = $connection->query("SELECT * FROM user WHERE username='$username'");

	if ($select_username->num_rows < 1) {

		$select_contact_no = $connection->query("SELECT * FROM user WHERE contact_no='$contact_no'");

		if ($select_contact_no->num_rows < 1) {
			
			if (move_uploaded_file($picture_tmp, '../images/admin/'.$picture)) {

				$insert = $connection->query("INSERT INTO user (identification, username, password, picture, type, contact_no) VALUES ('$username', '$username', '$password', '$picture', '$type', '$contact_no')");

				if ($insert === TRUE) {
					
					$user_account = $connection->query("INSERT INTO user_account (fullname, username, password, picture, type, contact_no) VALUES ('$fullname', '$username', '$password', '$picture', '$type', '$contact_no')");

					echo "Added";
					
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