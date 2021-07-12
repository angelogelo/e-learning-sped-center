<?php  

	include'connection.php';

	$id = $_GET['id'];
	$cms = $_GET['cms'];

	$update = $connection->query("UPDATE announcement SET cms='$cms' WHERE id='$id'");
	if ($update === TRUE) {
		echo $cms;
	} else {
		echo $connection->error;
	}

?>