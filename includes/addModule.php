<?php  
	
	include'connection.php';

	$file_tmp = $_FILES['file']['tmp_name'];
	$file_name = $_FILES['file']['name'];
	$file = $file_name;

	$title = mysqli_real_escape_string($connection, $_POST['title']);
	$id = mysqli_real_escape_string($connection, $_POST['id']);
	$teacher_id = mysqli_real_escape_string($connection, $_POST['teacher_id']);

	$select = $connection->query("SELECT * FROM module WHERE title='$title'");
	
	if ($select->num_rows < 1) {
		
		if (move_uploaded_file($file_tmp, '../files/'.$file)) {

			$insert = $connection->query("INSERT INTO module (disability, title, teacher_id, file, created_at) VALUES ('$id', '$title','$teacher_id', '$file', NOW())");

			addLog($connection, $teacher_id, "New Module", "Added a new Module to the System.");

			echo "Added";
		}else{
			echo "Failed";
		}
	}else{
		echo "Taken";
	}
?>