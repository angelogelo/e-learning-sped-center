<?php  
	
	include'connection.php';

	$contact_no = ucfirst(mysqli_real_escape_string($connection, $_POST['contact_no']));
	$social_media = ucfirst(mysqli_real_escape_string($connection, $_POST['social_media']));
	$email = ucfirst(mysqli_real_escape_string($connection, $_POST['email']));
	
	$insert = $connection->query("INSERT INTO contact (contact_no, social_media, email) VALUES ('$contact_no', '$social_media', '$email')");

	if ($insert === TRUE) {
		addLog($connection, "admin", "New ContactUs", "Added a new ContactUs to the System.");
		echo "Added";
	}else {
		echo "Failed";
	}
?>