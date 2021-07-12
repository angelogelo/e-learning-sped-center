<?php  
	
	include'connection.php';

	$title = mysqli_real_escape_string($connection, $_POST['title']);
	$teacher_id = mysqli_real_escape_string($connection, $_POST['teacher_id']);

	$select = $connection->query("SELECT * FROM flash_cards_title WHERE title='$title'");

	if ($select->num_rows < 1) {
		$insert = $connection->query("INSERT INTO flash_cards_title (title, teacher_id) VALUES ('$title','$teacher_id')");
		if ($insert === TRUE) {
			echo "Added";
		}else{
			echo "Failed";
		}
	}else{
		echo "Taken";
	}

?>