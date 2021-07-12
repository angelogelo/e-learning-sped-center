<?php  

	session_start();

	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "sped";

	$connection = new mysqli($host, $username, $password, $database);

	// Add Log
	function addLog($connection, $user, $title, $details){
		$insert = $connection->query("INSERT INTO logs (user, title, details) VALUES('$user', '$title', '$details')");
	}

	if (isset($_SESSION['admin'])) {

		addLog($connection, $_SESSION['admin'], "Admin Logout", "Admin has been logout to the System.");
		session_destroy();
		unset($_SESSION['admin']);
		header("location: ../login.php");

	}elseif(isset($_SESSION['teacher'])){

		addLog($connection, $_SESSION['teacher'], "Teacher Logout", "Teacher has been logout to the System.");
		session_destroy();
		unset($_SESSION['teacher']);
		header("location: ../login.php");
	
	}else{

		addLog($connection, $_SESSION['student'], "Student Logout", "Student has been logout to the System.");
		session_destroy();
		unset($_SESSION['student']);
		header("location: ../login.php");
	}
?>