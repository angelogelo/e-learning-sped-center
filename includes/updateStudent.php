<?php  
	
	include'connection.php';

	$picture_tmp = $_FILES['picture']['tmp_name'];
	$picture_name = $_FILES['picture']['name'];
	$picture = time()."_".$picture_name;

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$lrn = mysqli_real_escape_string($connection, $_POST['lrn']);
	$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
	$contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
	$address = mysqli_real_escape_string($connection, $_POST['address']);
	$disability = mysqli_real_escape_string($connection, $_POST['disability']);

	if ($picture_tmp !== "") {
		if (move_uploaded_file($picture_tmp, '../images/student/'.$picture)) {
			$update = $connection->query("UPDATE student SET lrn='$lrn', picture='$picture', fullname='$fullname', disability='$disability', contact_no='$contact_no', address='$address', gender='$gender' WHERE id='$update_id'");
					if ($update === TRUE) {
						echo "Updated";
			}else {
				$msg = $connection->error;
				echo "Failed";
			}
		}else {
			echo "Failed";
		}

	}else {
		$update = $connection->query("UPDATE student SET lrn='$lrn', fullname='$fullname', disability='$disability', contact_no='$contact_no', address='$address', gender='$gender' WHERE id='$update_id'");
		if ($update === TRUE) {
			echo "Updated";
		}else {
			$msg = $connection->error;
			echo "Failed";
		}
	}


?>