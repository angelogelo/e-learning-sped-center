<?php  
	
	include'connection.php';

	$update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
	$edit_contact_no = mysqli_real_escape_string($connection, $_POST['edit_contact_no']);
	$edit_social_media = mysqli_real_escape_string($connection, $_POST['edit_social_media']);
	$edit_email = mysqli_real_escape_string($connection, $_POST['edit_email']);

	$select = $connection->query("SELECT * FROM contact WHERE contact_no='$edit_contact_no'");

	if ($edit_contact_no !== "") {
		$update = $connection->query("UPDATE contact SET contact_no='$edit_contact_no', social_media='$edit_social_media', email='$edit_email' WHERE id='$update_id'");
		if ($update === TRUE) {

			echo "Updated";

			addLog($connection, "admin", "New Update", "Update a Contact Us to the System.");

		}else{
			echo "Failed";
		}
	}else{
		echo "Failed";
	}	
?>