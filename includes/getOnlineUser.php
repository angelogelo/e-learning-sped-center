<?php
	
	include '../includes/connection.php';

	$time=time();
	$output='';
	$disability = $connection->query("SELECT * FROM disability WHERE assign_teacher = '".$_SESSION['teacher']."'");
    while($disabilityRow = $disability->fetch_array()){

    $student = $connection->query("SELECT * FROM student WHERE disability = '".$disabilityRow['id']."'");
    while($studentRow = $student->fetch_array()){

    $loginUser = $connection->query("SELECT * FROM login_details WHERE user_id = '".$studentRow['lrn']."'");
    $loginUserRow = $loginUser->fetch_array();

	$class="text-danger";
	if($loginUserRow['last_login'] > $time){
		$status='Online';
		$class="text-success";
	}

	if ($studentRow['picture'] == "none" || $studentRow['picture'] == NULL) {
	        $picture = '<img src="../images/no_image.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">';
	}else {
	       $picture = '<img src="../images/student/'.$studentRow['picture'].'" alt="User Avatar" class="img-size-50 mr-3 img-circle">';
	}	
	
	$output.='<div class="media">
				  '.$picture.'
				  <div class="media-body">
					<h3 class="dropdown-item-title">
			            '.$studentRow['fullname'].'
			            <span class="float-right text-sm '.$class.'"><i class="fas fa-circle"></i></span>
			        </h3>
			        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.diffForHumansOnline($loginUserRow['last_activity']).'</p>
				  </div>
			  </div><div class="dropdown-divider"></div>';
		}
	}
	echo $output;

?>