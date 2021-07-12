<?php

	include 'header.php';
	
	$time = time()+10;
	$update = $connection->query("UPDATE login_details SET last_login='$time' WHERE user_id='$username'");

?>