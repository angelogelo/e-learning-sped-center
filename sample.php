<?php 
	
	$me = "2003";
	$password = password_hash($me, PASSWORD_DEFAULT);


	echo $password;

	// $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	// $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

	// echo $current_timestamp;

?>