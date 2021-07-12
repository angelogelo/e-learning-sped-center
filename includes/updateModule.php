<?php  
	
	include'connection.php';

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$edit_title = mysqli_real_escape_string($connection, $_POST['edit_title']);

	$file_tmp = $_FILES['file']['tmp_name'];
	$file_name = $_FILES['file']['name'];
	$file = $file_name;

	if ($file_tmp !== "") {
		if (move_uploaded_file($file_tmp, '../files/'.$file)) {
			
			$update = $connection->query("UPDATE module SET title='$edit_title', file='$file' WHERE id='$update_id'");

					if ($update === TRUE) {
						echo "Updated";
			}else {
				echo "Failed";
			}
		}else {
			echo "Failed";
		}

	}else {

		$update = $connection->query("UPDATE module SET title='$edit_title' WHERE id='$update_id'");

		if ($update === TRUE) {

			echo "Updated";
		}else {
			
			echo "Failed";
		}
	}	
?>