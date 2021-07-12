<?php
	
	include '../includes/connection.php';

	$username=$_SESSION['student'];
	$time=time();

	$loginUser = $connection->query("SELECT * FROM login_details");
	$number = 1;
	$output='';
	while ($loginUserRow = $loginUser->fetch_array()) {

	$student = $loginUserRow['user_id'];
	$student = $connection->query("SELECT * FROM student WHERE lrn='$student'");
	$studentRow = $student->fetch_array();

	$status='Offline';
	$class="btn-danger";
	if($loginUserRow['last_login'] > $time){
	$status='Online';
	$class="btn-success";
	}
	$output.='<tr>
	          <th scope="row">'.$number++.'</th>
	          <td>'.$studentRow['fullname'].'</td>
	          <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
	        </tr>';
	}
	echo $output;

?>