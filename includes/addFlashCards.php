<?php  
	
	include'connection.php';

	$file_tmp = $_FILES['file']['tmp_name'];
	$file_count = count($_FILES['file']['name']);
	$file = $file_name;

	$id = mysqli_real_escape_string($connection, $_POST['id']);

	for($i=0; $i < $file_count; $i++) { 

			$fileName = $_FILES['file']['name'][$i];

		if (move_uploaded_file($file_tmp[$i], '../flash-cards/'.$fileName)) {
			
			$insert = $connection->query("INSERT INTO flash_cards_file (title_id, files_images) VALUES ('$id', '$fileName')");
			echo "Added";

		}else{
			echo "Failed";
		}
	}
	
?>