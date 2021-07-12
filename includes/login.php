<?php  

	include'connection.php';

	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	$select = $connection->query("SELECT * FROM user WHERE username='$username'");
	if ($select->num_rows < 1) {
		echo "No Account";
	}else {
		$selectRow = $select->fetch_array();
		$passwordCheck = $selectRow['password'];

		$type = $selectRow['type'];

		if (password_verify($password, $passwordCheck)) {
			if ($type == "student") {
				$_SESSION['student'] = $username;
				$_SESSION['last_time'] = time();

				$student = $connection->query("SELECT * FROM student WHERE lrn='$username'");
				$studentRow = $student->fetch_array();

				$time=time()+10;
				$update = $connection->query("UPDATE login_details SET last_login = '$time' WHERE user_id = '".$_SESSION['student']."' ");

				addLog($connection, $username, "Student Login", "".$studentRow['fullname']." is now Login to the system");

				if ($studentRow['status'] == "pending" OR $studentRow['status'] == "deactivated") {
					echo "Pending";
					exit();
				}

			}else if ($type == "teacher") {
				$_SESSION['teacher'] = $username;

				$teacher = $connection->query("SELECT * FROM teacher WHERE teacher_id='$username'");
				$teacherRow = $teacher->fetch_array();

				addLog($connection, $username, "Teacher Login", "".$teacherRow['fullname']." is now Login to the system");

				if ($teacherRow['status'] == "deactivated") {
					echo "Deactivated";
					exit();
				}

			}else {
				$_SESSION['admin'] = $username;
				$_SESSION['last_time'] = time();
				addLog($connection, "Admin", "Admin Login", "Administrator is now Login to the system");
			}

			echo $type;

		}else {
			echo "No Account";
		}
	}

?>