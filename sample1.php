<?php

	include 'includes/connection.php';

	$select = $connection->query("SELECT * FROM assign_teacher");
    $selectRow = $select->fetch_array();

	//echo $selectRow['id'];
    $me = $selectRow['disability_id'];


	// $disability = explode(",", $me);

	// print_r($disability);


	//$number = "1,2";
	// $angelo = explode(",", $me);
	// echo "<pre>";
	// print_r(explode(" ", $angelo));
	// echo "</pre>";

	// foreach($arr as $value){
	// 	echo $value;
	// }

	

?>	