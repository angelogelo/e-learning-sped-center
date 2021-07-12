<?php  
	
	include'connection.php';

	$file_tmp = $_FILES['file']['tmp_name'];
	$file_name = $_FILES['file']['name'];
	$file = $file_name;

	$title = mysqli_real_escape_string($connection, $_POST['title']);
	$id = mysqli_real_escape_string($connection, $_POST['id']);
	$teacher_id = mysqli_real_escape_string($connection, $_POST['teacher_id']);

	$select = $connection->query("SELECT * FROM video WHERE title='$title'");
		
	if ($select->num_rows < 1) {
		
		if (move_uploaded_file($file_tmp, '../videos/'.$file)) {

			$insert = $connection->query("INSERT INTO video (disability, title, teacher_id, video) VALUES ('$id', '$title','$teacher_id', '$file')");

			addLog($connection, $teacher_id, "New Video Presentation", "Added a new Video Presentation to the System.");

			echo "Added";
		}else{
			echo "Failed";
		}
	}else{
		echo "Taken";
	}
	
?>